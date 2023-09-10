<div class="footer mt-auto p-3 fix-osahan-footer">
<div class="d-flex align-items-center justify-content-between rounded-4 shadow overflow-hidden bottom-nav-main">
<a href="home.php?home" class="col footer-bottom-nav <?php 
if (isset($_GET['home'])) {
  echo "active";
}
?>">
<span class="mdi mdi-home-variant-outline mdi-24px"></span>
<span>Home</span>
</a>
<!-- <a href="search.html" class="col footer-bottom-nav">
<span class="mdi mdi-magnify mdi-24px"></span>
<span>Search</span>
</a> -->
<!-- <a href="video.html" class="col footer-bottom-nav">
<span class="mdi mdi-video-outline mdi-24px"></span>
<span>Video</span>
</a> -->
<!-- <a href="message.html" class="col footer-bottom-nav">
<span class="mdi mdi-message-processing-outline mdi-24px"></span>
<span>Chat</span>
</a> -->
<a href="my-profile.php?my" class="col footer-bottom-nav <?php 
if (isset($_GET['my'])) {
  echo "active";
}
?>">
<span class="mdi mdi-account-outline mdi-24px"></span>
<span>Profile</span>
</a>
</div>
</div>