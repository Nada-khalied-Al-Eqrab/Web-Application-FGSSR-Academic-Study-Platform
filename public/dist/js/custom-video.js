(function () {
  var modal = document.getElementById('videoModal');
  var frame = document.getElementById('videoFrame');

  modal.addEventListener('show.bs.modal', function (e) {
    var btn = e.relatedTarget;
    var src = btn.getAttribute('data-video');
    frame.src = src;
  });

  modal.addEventListener('hidden.bs.modal', function () {
    frame.src = ""; // لإيقاف الفيديو عند الإغلاق
  });
})();
