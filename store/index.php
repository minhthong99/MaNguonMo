<?php 
 require_once ("libraries/Database.php");
    require_once("libraries/Function.php");
require_once("autoload/autoload.php");
     $db = new Database;
     $category =$db->fetchAll("category");
     $sqlNew ="SELECT * FROM product where 1 ORDER BY ID DESC LIMIT 3";
     $productNew=$db->fetchsql($sqlNew);
     $sqlHomecate="SELECT * FROM category Where home = 1 ORDER BY updated_at";
     $CategoryHome=$db->fetchsql($sqlHomecate);




     $data = [];
     foreach ($CategoryHome as $item) {
        $cateId =intval($item['id']);
     
        $sql="SELECT * FROM product Where category_id = $cateId";
        $ProductHome=$db->fetchsql($sql);
        $data[$item['name']]=$ProductHome;
     }

?>
<?php require_once ("layout/header.php"); ?>

                <div class="col-md-9 bor">
                        <section id="slide" class="text-center" >
                            <img src="public/frontend/images/legacy.jpg" class="" , width="100%">
                        </section>

                        <section class="box-main1">
                          <?php foreach ($data as $key => $value) :  ?>
                              <h3 class="title-main"><a href=""><?php echo $key ?></a> </h3>
                            
                            <div class="showitem clearfix">
                              <?php foreach ($value as $item): ?>
                                  <div class="col-md-3 item-product bor">
                                    <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                                        <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                                    </a>
                                    <div class="info-item">
                                        <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                      <?php if($item['sale'] > 0) : ?>
                                          <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?> </b></p> <?php else : ?>
                                         <p><?php echo formatPrice($item['price']) ?> </p>
                                  
                                        <?php endif ?>

                                    </div>
                            
                              
                                    <div class="hidenitem">
                                        <p><a href=""><i class="fa fa-search"></i></a></p>
                                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                                        <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                           
                                </div>
                           <?php endforeach ?>
                            </div>
                      <?php endforeach ?>
                        </section>

             </div>

      <?php require_once ("layout/footer.php"); ?>

           