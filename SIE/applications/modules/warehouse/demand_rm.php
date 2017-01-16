<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	Warehouse Department
  </h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="#">Warehouse Department</a></li>
	<li class="active"><?php if(empty($_GET['p']) || $_GET['p']=='add'){?>Add<?}else{?>List<?}?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
		  <!-- general form elements -->
		  <div class="box box-primary">
			<div class="box-header with-border">
				
				<h3 class="box-title">
					Confirm DRM (Demand of Raw Materials)
					
				</h3>
			  
			  <div class="pull-right">
				<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=list&open=<?=$_GET['open']?>">DATA LIST</a>
			  </div>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<?php
			switch($_GET['p']){
				case 'add':?>
					<?php
					$date=date("m/d/Y")." ".date("h:i:s");
					$tg=str_replace(" ","",$_POST['start_from']);
					$pecah=explode("-",$tg);
					$start=$pecah[0];
					$from=$pecah[1];
					$query_dm=$query("select * from tbl_demand_rm where id='$_GET[id]'");
					$row_dm=$fetch($query_dm);
					$query_pp=$query("select * from tbl_production_planning where id='$row_dm[production_planning]'");
					$row_pp=$fetch($query_pp);
					if(empty($row_pp['start_date']) || empty($row_pp['end_date'])){
						$tgl=date("m/d/Y")."-".date("m/d/Y");
					}
					else{
						$tgl=$row_pp['start_date']."-".$row_pp['end_date'];
					}
					
					?>
					<?php
					
					if(isset($_POST['submit']) || isset($_POST['publish'])){
						if(empty($_POST['title']) || empty($_POST['qty'])){
							?>
								<div class="box-body">
									<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<h4><i class="icon fa fa-ban"></i> Message!</h4>
										Empty field!
									</div>
								</div>
							<?
						}
						else{
							if(empty($_POST['publish'])){$p="add";}
							else{$p="list";}
							
							$values="'$id',";//id
							$values.="'$_POST[title]',";//title
							$values.="'$_GET[id]',";//production_planning
							$values.="'$_POST[id_product]',";//id_product
							$values.="'$_POST[qty]',";//qty
							$values.="'$start',";//start_date
							$values.="'$from',";//end_date
							$values.="'$S_userid',";//created_by
							$values.="'',";//updated_by
							$values.="'$date',";//created_date
							$values.="'',";//updated_date
							$values.="'$_POST[correction]',";//correction
							$values.="'',";//correction_by
							$values.="'$_POST[published]',";//published
							$values.="'0'";//status
							$insert=$query("insert into tbl_demand_rm values($values)");
							if($insert){
								$update=$query("update tbl_production_planning SET published='0'");
								if($update){
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$p&edit=1&id=$id&open=$_GET[open]&msg=sks'>";
								}
							}
							else{echo mysql_error();}
							
						}
					}
					?>
					<?php
					if($_GET['msg']=='sks'){
						?>
							<div class="box-body">
								<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Message!</h4>
								Success.
							  </div>
							 </div>
						<?
					}
					?>
					<form action="" method="post" enctype="multipart/form-data">
					  <div class="box-body">
					  <div class="col-md-6" style="padding-left:0px;">
						<div class="form-group">
							<label for="exampleInputEmail1">Title</label>
							<input disabled type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name="title" value="<?=$row_pp['title']?>">
						</div>
					  </div>
					  
					  <div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Product</label>
							<select disabled name="id_product" class="form-control select2">
							<option value="0">None</value>
							<?php
							$query_pr=$query("select * from tbl_product_header order by name");
							while($row_pr=$fetch($query_pr)){
							?>
								<option value="<?=$row_pr['id']?>" <?php if($row_pr['id']==$row_pp['id_product']){?>selected<?}?>><?=$row_pr['name']?></option>
							<?
							}
							?>
							</select>
						</div>
					  </div>
					   <div class="col-md-6" style="padding-left:0px;">
						<div class="form-group">
							<label>Productions Qty</label>
							<div class="input-group">
								<input disabled type="text" name="qty" value="<?=$row_pp['qty']?>" class="form-control">
								<span class="input-group-addon"> Pcs</span>
							</div>
							
						</div>
					  </div>
					  
					  <div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Production Date</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input disabled type="text" name="start_from" class="form-control pull-right" id="reservation" value="<?=$tgl?>">
							</div>
							
						</div>
					  </div>
						
						<!--material-->
							<div class="form-group">
							<table width="100%" class="table table-striped">
							<thead>
							<tr>
								<th width="20">NO</th>
								<th width="600">MATERIALS</th>
								<th width="100"><center>QTY</center></th>
							</tr>
							</thead>
							<tbody>
							<?php
							for($i=1;$i<=15;$i++){
							?>
							<?php
							$b=$i-1;
							$request_header=$id;
							$item="material$i";
							$supplier="supplier$i";
							$qty="qty$i";
							$unit="unit$i";
							$description="description$i";
							$item_material=$_POST[$item];
							$supplier_material=$_POST[$supplier];
							$qty_material=$_POST[$qty];
							$unit_material=$_POST[$unit];
							$description_material=$_POST[$description];
							$query_pr=$query("select * from tbl_product_item where product_header='$row_pp[id_product]' order by id ASC limit $b,1");
							$row_pr=$fetch($query_pr);
							$query_stock=$query("select * from tbl_material where id='$row_pr[item]'");
							$row_stock=$fetch($query_stock);
							
							if($row_pr['qty'] > $row_stock['stock']){
								$status="<small class='label pull-left bg-red'>NOT AVAILABLE</small>";
							}else{
								$status="<small class='label pull-left bg-green'>AVAILABLE</small>";
							
							}
							?>
								<?php if(empty($row_pr['id'])){}else{?>
									<tr>
										<td><?=$i?></td>
										<td><input type="hidden" name="exist<?=$i?>" value="<?=$row_pr['id']?>">
										<select disabled name="material<?=$i?>" class="form-control select2" style="width: 100%;">
										  <option></option>
										<?php
										$query_material=$query("select * from tbl_material order by name");
										while($row_material=$fetch($query_material)){
										?>
											<option value="<?=$row_material['id']?>" <?php if($row_material['id']==$row_pr['item']){?>selected<?}?>><?=$row_material['name']?></option>
										<?
										}
										?>
										</select>
										
										</td>
										<?php
										$stock_update=$row_stock['stock']-$row_pr['qty'];
										if(isset($_POST['publish'])){
											$update=$query("update tbl_material SET stock='$stock_update' where id='$row_stock[id]'");
										}
										?>
										<td>
											<div class="input-group">
												<input disabled type="text" class="form-control"  name="qty<?=$i?>"  value="<?php if(empty($row_pr['qty'])){}else{?><?=$row_pr['qty']?><?}?>">
												<span class="input-group-addon"> <?=$row_pr['unit']?></span>
											</div>
											
										</td>
									</tr>
								<?}?>
							<?}?>
							</tbody>
							</table>
						</div>
						<!---ende-->
						
						
						<div class="form-group has-warning">
							<label><i class="fa fa-bell-o"></i> Correction</label>
							<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="correction" id="inputWarning"><?=$row_pp['correction']?></textarea>
						</div>
						
					</form>
				<?break;
				default:?>
					<script type="text/javascript">
						<!--
						function confirmation(noid) {
							var answer = confirm("Are You sure want to delete ?")
							if (answer){
								//alert("Bye bye!")
								window.location = "?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=<?=$_GET['p']?>&open=<?=$_GET['open']?>&action=delete&id=" + noid;
										
							}
									
						}
						//-->
						</script>
					<?php
					if($_GET['action']=='unpublished'){
							$update=$query("update tbl_production_planning SET published='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							
							$update=$query("update tbl_production_planning SET published='1' where id='$_GET[id]'");
							if($update){
							}
						}
					if($_GET['action']=='delete'){
						$delete=$query("delete from tbl_production_planning where id='$_GET[id]'");
						if($delete){
							
						}
						else{echo mysql_error();}
					}
					?>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th>No</th>
							  <th>Code</th>
							  <th>Title</th>
							  <th>Product</th>
							  <th>Qty</th>
							  <th>Date</th>
							  <th>Sts</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_dm=$query("select * from tbl_demand_rm order by id DESC");
							while($row_dm=$fetch($query_dm)){
							$query_product=$query("select * from tbl_product_header where id='$row_dm[id_product]'");
							$row_product=$fetch($query_product);
							$nourut++;
							//published
							if($row_dm['published']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_dm[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_dm[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
							
							
							// status
							if($row_dm['status']==1){
								$status="<small class='label center bg-green'>COMPLETE</small>";
							}
							else{
								$status="<small class='label center bg-red'>ON PROCESS</small>";
							}
							//Correction
							if(!empty($row_pp['correction_by'])){
									$correction="<small class='label pull-right bg-red'>correction</small>";
							}else{$correction="";}
							//end correction
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left">#<?=sprintf('%03d',$row_dm['id'])?>
										<?=$correction?>
										</td>
										<td align="left"><?=$row_dm['title']?></td>
										<td align="left"><?=$row_product['name']?></td>
										<td align="center"><?=$row_dm['qty']?></td>
										<td align="center"><?=$row_dm['created_date']?></td>
										<td align="center"><?=$status?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_dm['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
											<a href="#" onClick='confirmation(<?=$row_dm['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
										</td>
									</tr>
								<?
							}?>
						  </table>
						</div>
				<?break;
			}
			?>
			
		  </div>
		  <!-- /.box -->
		</div>
	</div>
</section>