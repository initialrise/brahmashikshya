function updateLink(url) {
  var ok = document.getElementsByTagName("video")[0];
  var vid_src = (document.getElementById("vid-src").src = "videos/" + url);
  ok.load();
}
