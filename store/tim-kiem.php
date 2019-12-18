<?php 
 require_once ("libraries/Database.php");
    require_once("libraries/Function.php");
require_once("autoload/autoload.php");
     $db = new Database;
     $category =$db->fetchAll("category");
     $sql="SELECT * FROM product WHERE 1";
     $keyword= '';
     if(isset($_GET['keyword']) && $_GET['keyword'] != NULL)
     {
     	$keyword=$_GET['keyword'];
     	$sql="AND name LIKE '%keyword%' ";
     }
     $kqtk= DB::fetchsql($sql);

 ?>
 <?php if(isset($kqtk) && count($kqtk) > 0): ?>
 <ul id="returnsearch">
 	<?php foreach($kqtk as $item): ?>
     <li class="item-product-search">
     	<a href="chi-tiet-sp.php?id=<?= $item['id'] ?>"> 
     		<img src="public/uploads/product/<?php echo $item['thunbar'] ?>" alt="" class="pull-left" width="50px" height="50px">
     		
     			<div class="pull-right" style="...">
     				<a href="chi-tiet-sp.php?id=<?= $item['id']?>"><?php echo ColorFind($keyword,$item["name"]) ?></a>
     				<?php if($item['sale']) : ?>
     					Cũ:<b class="sale"><?= formatPrice($item['sale']) ?>đ</b><br>
     					Mới:<b class="price"><?= formatpricesale($item['price'],$item['sale']) ?>đ</b><br>
     					<?php else : ?>
     						Giá :<b class="price"><?=formatPrice($item['price']) ?>đ</b><br>
     					<?php endif : ?>
     					<span class="view"><i class="fa fa-eye"></i><?= $item['view'] ?> : <i class="fa fa-heart-o"></i><?= $item['id'] ?></span>
     			</div>
     			<div class="clearfix">
     				
     			</div>
     		</a>
     </li>
     <?php endforeeach : ?>
     
 </ul>
 <?php else : ?>
 	<ul id="returnseach">
 	    <li>Không có kết quả tìm kiếm</li>
 	   
 	</ul>
 	<?php endif : ?>