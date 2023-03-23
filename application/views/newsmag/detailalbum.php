<div class="td-pb-span8 td-main-content" role="main">
<div class="td-ss-main-content">
<div class="clearfix"></div>
<article class="post-219 post type-post status-publish format-gallery has-post-thumbnail hentry category-tagdiv-activities post_format-post-format-gallery">
    <div class="td-post-header td-pb-padding-side">
        <div class=entry-crumbs>
            <?php
            $roww = $this->model_utama->view_where('album',array('album_seo' => $this->uri->segment(3)))->row_array();
            echo "<span><a title='' class='entry-crumb' href='".base_url()."'>Home</a></span> 
                  <i class='td-icon-right td-bread-sep td-bred-no-url-last'></i> <span class='td-bred-no-url-last'>$rows[jdl_album]</span>";
            ?>
        </div>
        <header>
            <?php
            echo "<h1 class='entry-title'>$rows[jdl_album]</h1>
                  <div class='meta-info'>
                    <div class='td-post-author-name'>
                        <div class='td-author-by'>By</div> <a href='#'>$rows[nama_lengkap]</a><div class='td-author-line'> - </div> 
                    </div> 
                    <span class='td-post-date'><time class='entry-date updated td-module-date'>".tgl_indo($rows['tgl_posting']).", $rows[jam] WIB</time></span> 
                    <div class='td-post-views'><i class='td-icon-views'></i><span class='td-nr-views-147'>".number_format($rows['hits_album']+1)."</span></div> 
                  </div>";
            ?>
        </header>
    </div>

    <div class="td-post-sharing td-post-sharing-top td-pb-padding-side"><span class="td-post-share-title">SHARE</span>
        <div class="td-default-sharing ">
            <a class="td-social-sharing-buttons td-social-facebook" href="https://www.facebook.com/sharer.php?u=<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><div class="td-sp td-sp-facebook"></div><div class="td-social-but-text">Facebook</div></a>
            <a class="td-social-sharing-buttons td-social-twitter" href="https://twitter.com/intent/tweet?text=<?php echo $rows['jdl_album']; ?>&amp;url=<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>"><div class="td-sp td-sp-twitter"></div><div class="td-social-but-text">Twitter</div></a>
            <a class="td-social-sharing-buttons td-social-google" href="https://plus.google.com/share?url=<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><div class="td-sp td-sp-googleplus"></div></a>
            <a class="td-social-sharing-buttons td-social-pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><div class="td-sp td-sp-pinterest"></div></a>
            <a class="td-social-sharing-buttons td-social-whatsapp" href="whatsapp://send?text=<?php echo $rows['jdl_album']; ?>%20-%20<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>"><div class="td-sp td-sp-whatsapp"></div></a>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="td-post-content td-pb-padding-side">
        <style type="text/css">
            <?php 
                $no = 1; 
                $detailalbum2 = $this->model_utama->view_join_two('gallery','users','album','username','id_album',array('gallery.id_album' => $roww['id_album']),'id_gallery','DESC',0,50);
                foreach ($detailalbum2->result_array() as $h) { 
                if (trim($h['gbr_gallery'])==''){ $gbr_gallery = 'no-image.jpg'; }else{ $gbr_gallery = $h['gbr_gallery']; }
            ?>
                #lokomedia_gallery .td-doubleSlider-2 .td-item<?php echo $no; ?>{background:url(<?php echo base_url()."asset/img_galeri/$gbr_gallery"; ?>) 0 0 no-repeat}
            <?php $no++; } ?>
        </style>

    <div id="lokomedia_gallery" class="td-gallery td-slide-on-2-columns">
        <div class="post_td_gallery">
            <div class="td-gallery-slide-top">
            <?php 
            echo "<div class='td-gallery-title'>$rows[jdl_album]</div>
                  <div class='td-gallery-controls-wrapper'>
                    <div class='td-gallery-slide-count'><span class='td-gallery-slide-item-focus'>1</span> of ".$detailalbum->num_rows()."</div>
                    <div class='td-gallery-slide-prev-next-but'>
                        <i class='td-icon-left doubleSliderPrevButton'></i>
                        <i class='td-icon-right doubleSliderNextButton'></i>
                    </div>
                  </div>";
            ?>
            </div>

            <div class="td-doubleSlider-1">
                <div class="td-slider">
                    <?php 
                    $no = 1; 
                    $detailalbum2 = $this->model_utama->view_join_two('gallery','users','album','username','id_album',array('gallery.id_album' => $roww['id_album']),'id_gallery','DESC',0,50);
                    foreach ($detailalbum2->result_array() as $h) { 
                    if (trim($h['gbr_gallery'])==''){ $gbr_gallery = 'no-image.jpg'; }else{ $gbr_gallery = $h['gbr_gallery']; }
                    echo "<div class='td-slide-item td-item$no'>
                            <figure class='td-slide-galery-figure td-slide-popup-gallery'>
                                <a class=slide-gallery-image-link href='".base_url()."asset/img_galeri/$gbr_gallery' title=photo4 data-caption='@copyright 2018' data-description='$h[keterangan]'>
                                    <img src='".base_url()."asset/img_galeri/$gbr_gallery' alt='$h[gbr_gallery]'>
                                </a>
                                <figcaption style='padding-bottom:30px;' class='td-slide-caption td-gallery-slide-content'><div class=td-gallery-slide-copywrite></div><span>$h[jdl_gallery]</span></figcaption>
                            </figure>
                        </div>";
                        $no++;
                    }
                    ?>
                </div>
            </div>
			
            
			<?php 
			$no = 1; 
			$detailalbum2 = $this->model_utama->view_join_two('gallery','users','album','username','id_album',array('gallery.id_album' => $roww['id_album']),'id_gallery','DESC',0,50);
			$jmlgambar = $detailalbum2->num_rows();
			
			if($jmlgambar > 7 and $jmlgambar < 15){
				echo "<div class='td-doubleSlider-2' style='padding-bottom:130px;'>";
			}elseif($jmlgambar >= 15 ){
				echo "<div class='td-doubleSlider-2' style='padding-bottom:220px;'>";
			}else{
				echo "<div class='td-doubleSlider-2'>";
			}
			?>
			
                <div class=td-slider>
					<?php
					foreach ($detailalbum2->result_array() as $h) {  
                        echo "<div class='td-button td-item$no'>
                                <div class=td-border></div>
                              </div>";
                        $no++;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
        <div class="td-paragraph-padding-1">
            <?php echo "$rows[keterangan]"; ?>
        </div>
    </div>

    <footer>
        <?php
        $prev = $this->db->query("SELECT * FROM album where id_album < $rows[id_album] ORDER BY id_album DESC LIMIT 1")->row_array();
        $next = $this->db->query("SELECT * FROM album where id_album > $rows[id_album] ORDER BY id_album ASC LIMIT 1")->row_array();
        echo "<div class='td-block-row td-post-next-prev'>
                <div class='td-block-span6 td-post-prev-post'>
                <div class='td-post-next-prev-content'>
                    <span>Previous article</span><a href='".base_url()."albums/detail/$prev[album_seo]'>$prev[jdl_album]</a>
                </div>
                </div>

                <div class='td-next-prev-separator'></div>

                <div class='td-block-span6 td-post-next-post'>
                <div class='td-post-next-prev-content'>
                    <span>Next article</span><a href='".base_url()."albums/detail/$next[album_seo]'>$next[jdl_album]</a>
                </div>
                </div>
            </div>"; 
        ?>
    </footer>
</article>

<div class="td_block_wrap td_block_related_posts td_with_ajax_pagination td-pb-border-top td_block_template_1">
<h4 class="td-related-title"><a class="td-related-left td-cur-simple-item" href="#">ALBUM LAINNYA</a></h4>

<div class="td_block_inner">
<div class="td-related-row">
    <?php
      $randvideo = $this->model_utama->view_ordering_limit('album','id_album','RANDOM',0,3);
      foreach ($randvideo->result_array() as $row) {  
          echo "<div class='td-related-span4'>
                    <div class='td_module_related_posts td-animation-stack td_mod_related_posts'>
                        <div class='td-module-image'>
                            <div class='td-module-thumb'>
                            <a href='".base_url()."albums/detail/$row[album_seo]' rel='bookmark' title='$row[jdl_album]'>";
                                    if ($row['gbr_album'] ==''){
                                        echo "<img style='width:300px; height:160px' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/img_album/no-image.jpg' alt='no-image.jpg'/>";
                                    }else{
                                        echo "<img style='width:300px; height:160px' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/img_album/$row[gbr_album]' alt='$row[gbr_album]'/>";
                                    }
                                echo "</a>
                            </div> 

                        </div>
                        <div class='item-details'>
                            <h3 class='entry-title td-module-title'><a href='".base_url()."albums/detail/$h[album_seo]' rel='bookmark' title='$row[jdl_album]'>$row[jdl_album]</a></h3> 
                        </div>
                    </div>
                </div>";
      }      
    ?>
</div>
</div>
</div>

</div>
</div>
<script> var lokomedia_of_slides=<?php echo $detailalbum->num_rows(); ?>; jQuery(document).ready(function(){ jQuery("#lokomedia_gallery .td-slide-popup-gallery").magnificPopup({delegate:"a",type:"image",tLoading:"Loading image #%curr%...",mainClass:"mfp-img-mobile",gallery:{enabled:true,navigateByImgClick:true,preload:[0,1],tCounter:'%curr% of %total%'},image:{tError:"<a href='%url%'>The image #%curr%</a> could not be loaded.",titleSrc:function(item){return item.el.attr("data-caption")+"<div>"+item.el.attr("data-description")+"<div>";}},zoom:{enabled:true,duration:300,opener:function(element){return element.find("img");}},callbacks:{change:function(){jQuery("#lokomedia_gallery .td-doubleSlider-1").iosSlider("goToSlide",this.currItem.index+1);}}});jQuery("#lokomedia_gallery .td-doubleSlider-1").iosSlider({scrollbar:true,snapToChildren:true,desktopClickDrag:true,infiniteSlider:true,responsiveSlides:true,navPrevSelector:jQuery("#lokomedia_gallery .doubleSliderPrevButton"),navNextSelector:jQuery("#lokomedia_gallery .doubleSliderNextButton"),scrollbarHeight:"2",scrollbarBorderRadius:"0",scrollbarOpacity:"0.5",onSliderResize:td_gallery_resize_update_vars_lokomedia_gallery,onSliderLoaded:doubleSlider2Load_lokomedia_gallery,onSlideChange:doubleSlider2Load_lokomedia_gallery,keyboardControls:true});jQuery("#lokomedia_gallery .td-doubleSlider-2 .td-button").each(function(i){jQuery(this).bind("click",function(){jQuery("#lokomedia_gallery .td-doubleSlider-1").iosSlider("goToSlide",i+1);});});if(lokomedia_of_slides>7){jQuery("#lokomedia_gallery .td-doubleSlider-2").iosSlider({desktopClickDrag:true,snapToChildren:true,snapSlideCenter:true,infiniteSlider:true});}else{jQuery("#lokomedia_gallery .td-doubleSlider-2").addClass("td_center_slide2");}function doubleSlider2Load_lokomedia_gallery(args){jQuery("#lokomedia_gallery .td-doubleSlider-2").iosSlider("goToSlide",args.currentSlideNumber);jQuery("#lokomedia_gallery .td-doubleSlider-2 .td-button .td-border").css("border","3px solid #ffffff").css("opacity","0.5");jQuery("#lokomedia_gallery .td-doubleSlider-2 .td-button").css("border","0");jQuery("#lokomedia_gallery .td-doubleSlider-2 .td-button:eq("+(args.currentSlideNumber-1)+") .td-border").css("border","3px solid #ffffff").css("opacity","1");td_gallery_write_current_slide_lokomedia_gallery(args.currentSlideNumber);}function td_gallery_write_current_slide_lokomedia_gallery(slide_nr){jQuery("#lokomedia_gallery .td-gallery-slide-item-focus").html(slide_nr);}function td_gallery_resize_update_vars_lokomedia_gallery(args){if(tdDetect.isAndroid){setTimeout(function(){jQuery("#lokomedia_gallery .td-doubleSlider-1").iosSlider("update");},1500);}}});(function(){var html_jquery_obj=jQuery('html');if(html_jquery_obj.length&&(html_jquery_obj.is('.ie8')||html_jquery_obj.is('.ie9'))){var path='https://demo.tagdiv.com/newsmag/wp-content/themes/010/style.css';jQuery.get(path,function(data){var str_split_separator='#td_css_split_separator';var arr_splits=data.split(str_split_separator);var arr_length=arr_splits.length;if(arr_length>1){var dir_path='https://demo.tagdiv.com/newsmag/wp-content/themes/010';var splited_css='';for(var i=0;i<arr_length;i++){if(i>0){arr_splits[i]=str_split_separator+' '+arr_splits[i];}var formated_str=arr_splits[i].replace(/\surl\(\'(?!data\:)/gi,function regex_function(str){return' url(\''+dir_path+'/'+str.replace(/url\(\'/gi,'').replace(/^\s+|\s+$/gm,'');});splited_css+="<style>"+formated_str+"</style>";}var td_theme_css=jQuery('link#td-theme-css');if(td_theme_css.length){td_theme_css.after(splited_css);}}});}})();</script>
