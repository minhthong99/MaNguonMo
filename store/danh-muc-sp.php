<?php 
 require_once ("libraries/Database.php");
    require_once("libraries/Function.php");
require_once("autoload/autoload.php");
     $db = new Database;
     
         $category =$db->fetchAll("category");
        	 $sqlNew ="SELECT * FROM product where 1 ORDER BY ID DESC LIMIT 3";
     $productNew=$db->fetchsql($sqlNew);


          $id=intval(getInput('id'));
          $EditCategory =$db->fetchID("category",$id);

          if(isset($_GET['p']))
          {
          	$p=$_GET['p'];
          }
          else
          {
          	$p=1;
          }

          $sql="SELECT * FROM product WHERE category_id=$id";

          $total =count($db->fetchsql($sql));

          $product=$db->fetchJones("product",$sql,$total,$p,2,true);
          $sotrang=$product['page'];
        	unset($product['page']);
        	$path=$_SERVER['SCRIPT_NAME'];
?>
<?php require_once ("layout/header.php"); ?>

                <div class="col-md-9 bor">
                     

                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> <?php echo $EditCategory['name'] ?></a> </h3>
                              <div class="showitem clearfix">
                              	<?php foreach ($product as $item) : ?>
                              		   <div class="col-md-3 item-product bor">
                                 			  <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                                        <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                                    </a>
                                    <div class="info-item">
                                        <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                        <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?> </b></p>
                                    </div>
                            
                              
                                    <div class="hidenitem">
                                        <p><a href=""><i class="fa fa-search"></i></a></p>
                                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                                        <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                                </div>
                              	<?php endforeach ?>
                             
                             
                         
                       
                            </div>
                           <nav class="text-center">
                           	<ul class="pagination ">
                           		<?php for ($i=1;$i<= $sotrang;$i++ ) :?>
                           			 <li class="<?php echo isset($_GET['p'])&&$_GET['p'] == $i ? 'active' : '' ?>"><a href="<?php echo $path ?>?id=<?php echo $id ?>&&p=<?php echo $i ?>"><?php echo $i; ?></a></li>
                           		<?php endfor ?>
														 
														 
														</ul>
                           </nav>
                        </section>

             </div>
      <?php require_once ("layout/footer.php"); ?>

           