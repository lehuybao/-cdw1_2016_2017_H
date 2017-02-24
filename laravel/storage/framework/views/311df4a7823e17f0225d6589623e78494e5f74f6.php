<?php foreach ($banner as $banner): ?>
    </br>
    <?php echo $banner ['banner_id'] ?>
    <?php echo $banner ['banner_img'] ?>

<?php endforeach; ?>

<?php foreach ($detail as $detail): ?>
    </br>
    <?php echo $detail ['detail_id'] ?>
    <?php echo $detail ['detail_code'] ?>
    <?php echo $detail ['detail_img'] ?>
    <?php echo $detail ['detail_desription'] ?>
<?php endforeach; ?>

<?php foreach ($event as $event): ?>
    </br>
    <?php echo $event ['event_id'] ?>
    <?php echo $event ['event_img'] ?>
    <?php echo $event ['event_news'] ?>
    <?php echo $event ['event_title'] ?>
<?php endforeach; ?>

    <?php foreach ($introduce as $introduce): ?>
        </br>
        <?php echo $introduce ['introduce_id'] ?>
        <?php echo $introduce ['introduce_img'] ?>
        <?php echo $introduce['introduce_info'] ?>
    <?php endforeach; ?>
        
    <?php foreach ($lists as $lists): ?>
        </br>
        <?php echo $lists ['list_id'] ?>
        <?php echo $lists ['list_img'] ?>
         <?php echo $lists['list_code'] ?>
        <?php echo $lists['list_info'] ?>
    <?php endforeach; ?>

    <?php foreach ($merits as $merits): ?>
        </br>
        <?php echo $merits ['merit_id'] ?>
        <?php echo $merits ['merit_img'] ?>
        <?php echo $merits ['merit_prize'] ?>
    <?php endforeach; ?>

        <?php foreach ($slideshows as $slideshows): ?>
        </br>
        <?php echo $slideshows ['slideshow_id'] ?>
        <?php echo $slideshows ['slideshow_img'] ?>
        <?php echo $slideshows ['slideshow_title'] ?>
        <?php echo $slideshows ['slideshow_code'] ?>
        <?php echo $slideshows ['slideshow_info'] ?>
    <?php endforeach; ?>