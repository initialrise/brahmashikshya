function updateLink(url) {
  var ok = document.getElementsByTagName("video")[0];
  var vid_src = (document.getElementById("vid-src").src = "videos/" + url);
  ok.load();
}

function updateLabel() {
  const fileInput = document.getElementById("video");
  const label = document.getElementById("video-label");

  if (fileInput.files.length > 0) {
    const fileName = fileInput.files[0].name;
    label.textContent = "Selected Video: " + fileName;
  } else {
    label.textContent = "Upload Video";
  }
}
