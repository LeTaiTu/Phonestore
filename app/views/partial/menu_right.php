
  <section class="span3">
    <div class="side-holder">
      <article class="shop-by-list">
        <h2>Sản phẩm mới</h2>
        <div class="side-inner-holder">
          <ul class="list-group">
<?php foreach($dataSps as $key => $data): ?>
            <li class="list-group-item"><a href="index.php?cn=index&m=detail&slug=<?php echo $data['id_pro']; ?>&view=<?php echo $data['view']?>"><img style="height: 200px; width: 160px;" src="<?php echo PATH_UPLOAD_PRODUCT . "/" .$data['image'] ?>"></a><b><a href="index.php?cn=index&m=detail&slug=<?php echo $data['id_pro']; ?>&view=<?php echo $data['view']?>"><?php echo $data['name_pro']?></a></b></li>
            
<?php if ($key==2) {
  break;
} ?>
<?php endforeach?>
          </ul>  
        </div>
      </article>
    </div>
   <!--  <div class="side-holder">
      <article class="l-reviews">
        <h2>Sản phẩm hot</h2>
        <div class="side-inner-holder">
          <ul class="side-list">

            <li><a href="#"></a></li>

          </div>
        </article>
      </div> -->
    </section>
  </section>
</section>