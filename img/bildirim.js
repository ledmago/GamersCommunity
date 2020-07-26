function kodDostuBildirim(baslik,icerik,link,resim) {
if(resim == undefined){var ikon = 'img/bildirim.png';}
else{var ikon = resim;}
  if (!Notification) {alert('Tarayıcınız bildirimleri desteklemiyor.'); return;  }

  if (Notification.permission !== "granted")
    Notification.requestPermission();

  var notification = new Notification(baslik, {
    icon: ikon,
    body: icerik,
  });


  notification.onclick = function () {
    window.open(link);
  }
}