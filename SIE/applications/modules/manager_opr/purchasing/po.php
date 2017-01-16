<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	Purchasing Department
  </h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="#">Purchasing Department</a></li>
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
					Purchase Order
					
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
					$query_po_header=$query("select * from tbl_po_header where id='$_GET[id]'");
					$row_po_header=$fetch($query_po_header);
					$query_cek=$query("select * from tbl_po_header order by id DESC limit 1");
					$row_cek=$fetch($query_cek);
					if(empty($_GET['id'])){
						if(empty($row_cek['id'])){$id=1;}
						else{
							$id=$row_cek['id']+1;
						}
					}else{
						$id=$_GET['id'];
					}
					?>
					<?php
					if(isset($_POST['approve'])){
						$values="correction='$_POST[correction]',";
						$values.="correction_by='0',";
						$values.="approve1='1'";
						$update=$query("update tbl_po_header SET $values where id='$_GET[id]'");
						if($update){
							echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&mm=$_GET[mm]&s=$_GET[s]&l=$_GET[l]&p=list&open=$_GET[open]&msg=sks'>";
						}
					}
					if(isset($_POST['publish'])){
						$update=$query("update tbl_po_header SET correction='$_POST[correction]',correction_by='$S_userid' where id='$_GET[id]'");
						if($update){
							echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&mm=$_GET[mm]&s=$_GET[s]&l=$_GET[l]&p=list&open=$_GET[open]&msg=sks'>";
						}
					}
					if(isset($_POST['submit'])){
						if(empty($_POST['title']) || empty($_POST['supplier'])){
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
							if($_GET['edit']==0){
								
							}
							else{
								$values="title='$_POST[title]',";
								$values.="supplier='$_POST[supplier]',";
								$values.="correction='$_POST[correction]',";
								$values.="due_date='$_POST[date]'";
								$update=$query("update tbl_po_header SET $values where id='$_GET[id]'");
								if($update){
									for($i=1;$i<=15;$i++){
										$ex="exist$i";
										$exist=$_POST[$ex];
										$po_header=$id;
										$item="material$i";
										$price="price$i";
										$qty="qty$i";
										$unit="unit$i";
										$description="description$i";
										$item_material=$_POST[$item];
										$price_material=$_POST[$price];
										$qty_material=$_POST[$qty];
										$unit_material=$_POST[$unit];
										$description_material=$_POST[$description];
										if(!empty($exist)){
											$values2="item='$item_material',";//item
											$values2.="price='$price_material',";//price
											$values2.="supplier='$_POST[supplier]',";//supplier
											$values2.="qty='$qty_material',";//qty
											$values2.="unit='$unit_material',";//unit
											$values2.="description='$description_material'";//description
											$update2=$query("update tbl_po_item SET $values2 where po_header='$_GET[id]' and id='$exist'");
											if($update2){}
										}else{
											$values="'',";//id
											$values.="'$po_header',";//po_header
											$values.="'$item_material',";//item
											$values.="'$price_material',";//price
											$values.="'$_POST[supplier]',";//supplier
											$values.="'$qty_material',";//qty
											$values.="'$unit_material',";//unit
											$values.="'$description_material',";//description
											$values.="'$date',";//created_date
											$values.="'1'";//status
											if(empty($item_material)){}
											else{
												$insert2=$query("insert into tbl_po_item values($values)");
												if($insert2){
												// echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$_GET[id]&open=$_GET[open]&msg=sks'>";
												}
											}
										}
										
									}
									
									
								}
								else{echo mysql_error();}
								echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$_GET[id]&open=$_GET[open]&msg=sks'>";
							}
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
					  <div class="col-md-4" style="padding-left:0px;">
						<div class="form-group">
							<label for="exampleInputEmail1">Title</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="title" value="<?=$row_po_header['title']?>">
						</div>
					  </div>
					  
					  <div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Supplier</label>
							<select name="supplier" class="form-control">
							<option value="0">None</value>
							<?php
							$query_spp=$query("select * from tbl_supplier order by name");
							while($row_spp=$fetch($query_spp)){
							?>
								<option value="<?=$row_spp['id']?>" <?php if($row_po_header['supplier']==$row_spp['id']){?>selected<?}?>><?=$row_spp['name']?></option>
							<?
							}
							?>
							</select>
						</div>
					  </div>
					   <div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Date</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" name="date" value="<?=$row_po_header['due_date']?>" data-mask>
							</div>
							
						</div>
					  </div>
						<div class="box-footer">
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">&nbsp;&nbsp;
						<input type="submit" class="btn btn-primary" name="publish" value="Publish">&nbsp;&nbsp;
						<input type="submit" class="btn btn-primary" name="approve" value="Approve">
					  </div>					
						 <div class="form-group">
							<table width="100%" class="table table-striped">
							<thead>
							<tr>
								<th>NO</th>
								<th width="250">ITEM</th>
								<th width="200">PRICE</th>
								<th width="100"><center>QTY</center></th>
								<th width="100"><center>UNIT</center></th>
								<th width="300">DESCRIPTION</th>
							</tr>
							</thead>
							<tbody>
							<?php
							for($i=1;$i<=15;$i++){
							?>
							<?php
							$b=$i-1;
							$po_header=$id;
							$item="material$i";
							$qty="qty$i";
							$unit="unit$i";
							$description="description$i";
							$item_material=$_POST[$item];
							$qty_material=$_POST[$qty];
							$unit_material=$_POST[$unit];
							$description_material=$_POST[$description];
							$query_po=$query("select * from tbl_po_item where po_header='$_GET[id]' order by id ASC limit $b,1");
							$row_po=$fetch($query_po);
							?>
							<tr>
								<td><?=$i?></td>
								<td><input type="hidden" name="exist<?=$i?>" value="<?=$row_po['id']?>">
								<select name="material<?=$i?>" class="form-control select2" style="width: 100%;">
								  <option></option>
								<?php
								$query_material=$query("select * from tbl_material order by name");
								while($row_material=$fetch($query_material)){
								?>
									<option value="<?=$row_material['id']?>" <?php if($row_material['id']==$row_po['item']){?>selected<?}?>><?=$row_material['name']?></option>
								<?
								}
								?>
								</select>
								
								</td>
								<td><input type="text" class="form-control"  name="price<?=$i?>"  value="<?php if(empty($row_po['price'])){}else{?><?=$row_po['price']?><?}?>"></td>
								<td><input type="text" class="form-control"  name="qty<?=$i?>"  value="<?php if(empty($row_po['qty'])){}else{?><?=$row_po['qty']?><?}?>"></td>
								<td><input type="text" class="form-control"  name="unit<?=$i?>" value="<?=$row_po['unit']?>"></td>
								<td><input type="text" class="form-control"  name="description<?=$i?>" value="<?=$row_po['description']?>"></td>
							</tr>
							<?}?>
							</tbody>
							</table>
						</div>
						<div class="form-group has-warning">
							<label><i class="fa fa-bell-o"></i> Correction</label>
							<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="correction" id="inputWarning"><?=$row_po_header['correction']?></textarea>
						</div>
						
					  </div>
					 
					  
					  <!-- /.box-body -->

					  <div class="box-footer">
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">&nbsp;&nbsp;
						<input type="submit" class="btn btn-primary" name="publish" value="Publish">&nbsp;&nbsp;
						<input type="submit" class="btn btn-primary" name="approve" value="Approve">
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
							$update=$query("update tbl_po_header SET published='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							$update=$query("update tbl_po_header SET published='1' where id='$_GET[id]'");
						}
					if($_GET['action']=='delete'){
						$delete=$query("delete from tbl_po_header where id='$_GET[id]'");
						if($delete){
							$del=$query("delete from tbl_po_item where po_header='$_GET[id]'");
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
							  <th>Item</th>
							  <th>Published</th>
							  <th>App 1</th>
							  <th>App 2</th>
							  <th>App 3</th>
							  <th>Status</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_po=$query("select * from tbl_po_header where published='1' and approve2='0' and approve3='0' order by id DESC");
							while($row_po=$fetch($query_po)){
							$query_spp=$query("select * from tbl_supplier where id='$row_po[supplier]'");
							$row_spp=$fetch($query_spp);
							$query_item=$query("select * from tbl_po_item where po_header='$row_po[id]' and item!=0");
							$jml_item=$rows($query_item);
							$item=number_format($jml_item);
							$approve=$row_po['approve1']+$row_po['approve2']+$row_po['approve3'];
							$nourut++;
							//published
							if($row_po['published']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_po[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_po[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
							//approve
							if(empty($row_po['approve1'])){
								$approve1="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve1="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_po['approve2'])){
								$approve2="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve2="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_po['approve3'])){
								$approve3="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve3="<img src='$template/dist/img/ceklist.png'>";
							}
							//end approve
							
							//approve status
							if($approve==3){
								$status="<small class='label center bg-green'>COMPLETE</small>";	
							}
							else{
								$status="<small class='label center bg-red'>ON PROCESS</small>";
							}
							if(!empty($row_po['correction_by'])){
									$correction="<small class='label pull-right bg-red'>correction</small>";
							}else{$correction="";}
							//end correction
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left"><a href="print-po.php?id=<?=$row_po['id']?>" target="_blank">#<?=sprintf('%03d',$row_po['id'])?></a>
										<?=$correction?>
										</td>
										<td align="left"><?=$row_po['title']?></td>
										<td align="center"><?=$item?></td>
										<td align="center"><?=$published?></td>
										<td align="center"><?=$approve1?></td>
										<td align="center"><?=$approve2?></td>
										<td align="center"><?=$approve3?></td>
										<td align="center"><?=$status?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_po['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
											<a href="#" onClick='confirmation(<?=$row_po['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
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