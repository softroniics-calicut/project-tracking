import 'dart:convert';

import 'package:dio/dio.dart';
import 'package:downloads_path_provider_28/downloads_path_provider_28.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
//import 'package:fluttertoast/fluttertoast.dart';
import 'package:http/http.dart';
import 'package:image_downloader/image_downloader.dart';
import 'package:permission_handler/permission_handler.dart';
import 'package:project_tracking/down.dart';
import 'package:project_tracking/viewpic.dart';
import 'package:url_launcher/url_launcher.dart';

import 'constants.dart';


class View extends StatefulWidget {
  View({Key? key, required this.id}) : super(key: key);
  String id;
  @override
  State<View> createState() => _ViewState();
}

class _ViewState extends State<View> {
  var pic='';
  Future<dynamic> getData() async {
    var data={
      "id":widget.id,
    };
    var res = await post(Uri.parse('${Con.url}view_images.php'),body: data);
// print(widget.id);
    print(res.body);
    var r = jsonDecode(res.body);
    // var pic = r['file'];
    // print('                            $pic');
    return r;
  }


  Uri _url = Uri.parse('http://192.168.1.131/Project_tracking/images/');

  Future<void> _launchUrl() async {
    if (!await launchUrl(_url)) {
      throw Exception('Could not launch $_url');
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(),
      body: FutureBuilder(
          future: getData(),
          builder: (context,snap) {

            if(!snap.hasData){
              return Center(child: const CircularProgressIndicator());
            }
            else if(snap.data[0]['message']=='failed') {
              return Center(child: Text('No ProjectFiles added'));
            }
            else{

              return ListView.builder(
                itemCount: snap.data.length,
                itemBuilder: (context, index) {
                  return ListTile(
                    leading: Container(
                      height: 100,
                      width: 100,
                      color: Colors.white,
                      child: Image.asset('assets/images/${snap.data![index]['file']}'),

                    ),
                    title: Text(snap.data![index]['note']),
                    trailing: InkWell(
                        onTap: () async {
                          String fileurl = "http://192.168.0.106/project_tracking/images/${snap.data![index]['file']}";

                          print(fileurl);
                          Map<Permission, PermissionStatus> statuses = await [
                            Permission.storage,
                            //add more permission to request here.
                          ].request();

                          if(statuses[Permission.storage]!.isGranted){
                            var dir = await DownloadsPathProvider.downloadsDirectory;
                            if(dir != null){
                              String savename = "filenew.pdf";
                              String savePath = dir.path + "/$savename";
                              print(savePath);
                              //output:  /storage/emulated/0/Download/banner.png

                              try {
                                await Dio().download(
                                    fileurl,
                                    savePath,
                                    onReceiveProgress: (received, total) {
                                      if (total != -1) {
                                        print((received / total * 100).toStringAsFixed(0) + "%");
                                        //you can build progressbar feature too
                                      }
                                    });
                                print("File is saved to download folder.");
                                SnackBar(content: Text('Saved to downloads'),);
                              } on DioError catch (e) {
                                print(e.message);
                              }
                            }
                          }else{
                            print("No permission to read and write.");
                          }
                          // Navigator.push(context, MaterialPageRoute(builder: (context) {
                          //   return ViewPic(id: snap.data![index]['u_id']);
                          // },));
                        },
                        child: Icon(Icons.download)),
                  );
                },

              );
            }

          }
      ),
    );
  }
}
