
<html>
<style>
 
 .center {
  text-align: center;
}

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a.active {
  background-color: #ff6b81;
  color: white;
  border: 1px solid #ff6b81;
}

.pagination a:hover:not(.active) {background-color: #ff4757;}
</style>
  <!-- next page -->
  <div class="pagination" >
    <?php
        if($current_page > 1){
            $prev_page = $current_page -1 ;
        }
        else{
          $prev_page = 1;
        }
        
    ?>
    <?php  $id = $_GET['catid'];
            ?>
<a class="page-item" href="viewfoodList.php?catid=<?=$id?>&per-page=<?=$item_per_page?>&page_pagination=<?=$prev_page?>"><<</a>
    <?php for ($num =1; $num <= $totalPages; $num++){
        ?>
        <?php if($num != $current_page) { ?>
            <?php if($num > $current_page - 3 && $num < $current_page +3){ ?>
        <a href="viewfoodList.php?catid=<?php echo $id;?>&per-page=<?=$item_per_page?>&page_pagination=<?=$num;?>"><?=$num?></a>
            <?php } ?>
        <?php } else{ ?>
            <a class="active"><?=$num?></a>
            <?php }?>
    <?php }?> 
    <?php
        if($current_page <= $totalPages - 1){
            $next_page =$current_page + 1;
        ?>
    <a class="page-item" href="viewfoodList.php?catid=<?=$id?>&per-page=<?=$item_per_page?>&page_pagination=<?=$next_page?>">>></a>
        <?php
}
?> 
</div>
</html>

