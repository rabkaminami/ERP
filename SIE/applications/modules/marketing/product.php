<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	Marketing Department
  </h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="#">Marketing Department</a></li>
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
					New Product
					
				</h3>
			  
			  <div class="pull-right">
				<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&open=<?=$_GET['open']?>">ADD NEW</a> - 
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
					$query_req_header=$query("select * from tbl_sp_header where id='$_GET[id]'");
					$row_req_header=$fetch($query_req_header);
					$query_cek=$query("select * from tbl_sp_header order by id DESC limit 1");
					
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
					if(isset($_POST['submit']) || isset($_POST['publish'])){
						if(empty($_POST['title'])){
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
								$image=$_FILES['image']['name'];
								if(empty($image)){
									$img="";
								}
								else{
									define ("MAX_SIZE","100000"); 
									function getExtension($str) {
											 $i = strrpos($str,".");
											 if (!$i) { return ""; }
											 $l = strlen($str) - $i;
											 $ext = substr($str,$i+1,$l);
											 return $ext;
									 }
									 $errors=0;
									 if(isset($_POST['submit']) || isset($_POST['publish'])) 
									 {
										$image=$_FILES['image']['name'];
										if ($image) 
										{
											$filename = stripslashes($_FILES['image']['name']);
											$extension = getExtension($filename);
											$extension = strtolower($extension);
									 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
											{
												?><div id="error">Unknown extension!</div><?
												$errors=1;
											}
											else
											{
									$size=filesize($_FILES['image']['tmp_name']);
									$image_name=time().'.'.$extension;
									$newname="upload/".$image_name;
									$copied = copy($_FILES['image']['tmp_name'], $newname);
									if (!$copied) 
									{
										?><div id="error">Copy unsuccessfull! <?=error()?></div><?
										$errors=1;
									}}}}
									
									$img=$image_name;
								}
								if($_POST['submit']){$published="";}
								if($_POST['publish']){$published=1;}
								$values="'$id',";//id
								$values.="'$_POST[title]',";//title
								$values.="'$_POST[date]',";//date
								$values.="'$date',";//created_date
								$values.="'$_POST[correction]',";//correction
								$values.="'$img',";//image
								$values.="'',";//correction_by
								$values.="'',";//approve1
								$values.="'',";//approve2
								$values.="'',";//approve3
								$values.="'$published',";//published
								$values.="''";//status
								$insert=$query("insert into tbl_sp_header values($values)");
								if($insert){
									for($i=1;$i<=15;$i++){
										$sp_header=$id;
										$item="material$i";
										$qty="qty$i";
										$unit="unit$i";
										$description="description$i";
										$item_material=$_POST[$item];
										$qty_material=$_POST[$qty];
										$unit_material=$_POST[$unit];
										$description_material=$_POST[$description];
										
										$values="'',";//id
										$values.="'$sp_header',";//sp_header
										$values.="'$item_material',";//item
										$values.="'$qty_material',";//qty
										$values.="'$unit_material',";//unit
										$values.="'$description_material',";//description
										$values.="'$date',";//created_date
										$values.="'1'";//status
										if(empty($item_material)){}
										else{
											$insert2=$query("insert into tbl_sp_item values($values)");
											if($insert2){
												// echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$id&open=$_GET[open]&msg=sks'>";
											}
										}
									}
									// echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$id&open=$_GET[open]&msg=sks'>";
								}
								else{echo mysql_error();}
								echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$id&open=$_GET[open]&msg=sks'>";
							}
							else{
								$image=$_FILES['image']['name'];
								if(empty($image)){
									
								}
								else{
									define ("MAX_SIZE","100000"); 
									function getExtension($str) {
											 $i = strrpos($str,".");
											 if (!$i) { return ""; }
											 $l = strlen($str) - $i;
											 $ext = substr($str,$i+1,$l);
											 return $ext;
									 }
									 $errors=0;
									 if(isset($_POST['submit']) || isset($_POST['publish'])) 
									 {
										$image=$_FILES['image']['name'];
										if ($image) 
										{
											$filename = stripslashes($_FILES['image']['name']);
											$extension = getExtension($filename);
											$extension = strtolower($extension);
									 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
											{
												?><div id="error">Unknown extension!</div><?
												$errors=1;
											}
											else
											{
									$size=filesize($_FILES['image']['tmp_name']);
									$image_name=time().'.'.$extension;
									$newname="upload/".$image_name;
									$copied = copy($_FILES['image']['tmp_name'], $newname);
									if (!$copied) 
									{
										?><div id="error">Copy unsuccessfull! <?=error()?></div><?
										$errors=1;
									}}}}
									
									$img=$image_name;
								}
								$values="title='$_POST[title]',";
								if(empty($image)){}else{
									$values.="image='$img',";
								}
								if($_POST['submit']){}
								if($_POST['publish']){
									$values.="published='1',";
								}
								$values.="correction='$_POST[correction]',";
								$values.="date='$_POST[date]'";
								$update=$query("update tbl_sp_header SET $values where id='$_GET[id]'");
								if($update){
									$imagez="upload/$row_req_header[image]";
									if(!empty($image)){unlink($imagez);}
									for($i=1;$i<=15;$i++){
										$ex="exist$i";
										$exist=$_POST[$ex];
										$sp_header=$id;
										$item="material$i";
										$qty="qty$i";
										$unit="unit$i";
										$description="description$i";
										$item_material=$_POST[$item];
										$qty_material=$_POST[$qty];
										$unit_material=$_POST[$unit];
										$description_material=$_POST[$description];
										if(!empty($exist)){
											$values2="item='$item_material',";//item
											$values2.="qty='$qty_material',";//qty
											$values2.="unit='$unit_material',";//unit
											$values2.="description='$description_material'";//description
											$update2=$query("update tbl_sp_item SET $values2 where sp_header='$_GET[id]' and id='$exist'");
											if($update2){}
										}else{
											$values="'',";//id
											$values.="'$sp_header',";//sp header
											$values.="'$item_material',";//item
											$values.="'$qty_material',";//qty
											$values.="'$unit_material',";//unit
											$values.="'$description_material',";//description
											$values.="'$date',";//created_date
											$values.="'1'";//status
											if(empty($item_material)){}
											else{
												$insert2=$query("insert into tbl_sp_item values($values)");
												if($insert2){
												// echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$_GET[id]&open=$_GET[open]&msg=sks'>";
												}
											}
										}
										
									}
									
									
								}
								else{echo mysql_error();}
								if($_POST['submit']){
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=1&id=$_GET[id]&open=$_GET[open]&msg=sks'>";
								}
								if($_POST['publish']){
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=list&open=$_GET[open]&msg=sks'>";
								}
								
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
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="title" value="<?=$row_req_header['title']?>">
						</div>
					  </div>
					  
					  <div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Image &nbsp;&nbsp;<?php if($_GET['edit']==1){?><a href="upload/<?=$row_req_header['image']?>" target="_blank">Lihat Gambar</a><?}?></label>
							<input type="file" name="image">
							
						</div>
					  </div>
					   <div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Date</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" name="date" value="<?=$row_req_header['date']?>" data-mask>
							</div>
							
						</div>
					  </div>
						<div class="form-group">
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">&nbsp;&nbsp;
						<input type="submit" class="btn btn-primary" name="publish" value="Publish">
					  </div>						
						 <div class="form-group">
							<table width="100%" class="table table-striped">
							<thead>
							<tr>
								<th width="10">NO</th>
								<th width="200">ITEM</th>
								<th width="100"><center>QTY</center></th>
								<th width="90"><center>UNIT</center></th>
								<th width="200">DESCRIPTION</th>
							</tr>
							</thead>
							<tbody>
							<?php
							for($i=1;$i<=15;$i++){
							?>
							<?php
							$b=$i-1;
							$sp_header=$id;
							$item="material$i";
							$qty="qty$i";
							$unit="unit$i";
							$description="description$i";
							$item_material=$_POST[$item];
							$qty_material=$_POST[$qty];
							$unit_material=$_POST[$unit];
							$description_material=$_POST[$description];
							$query_pr=$query("select * from tbl_sp_item where sp_header='$_GET[id]' order by id ASC limit $b,1");
							$row_pr=$fetch($query_pr);
							?>
							<tr>
								<td><?=$i?></td>
								<td><input type="hidden" name="exist<?=$i?>" value="<?=$row_pr['id']?>">
								<select name="material<?=$i?>" class="form-control select2" style="width: 100%;">
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
								
								<td><input type="text" class="form-control"  name="qty<?=$i?>"  value="<?php if(empty($row_pr['qty'])){}else{?><?=$row_pr['qty']?><?}?>"></td>
								<td><input type="text" class="form-control"  name="unit<?=$i?>" value="<?=$row_pr['unit']?>"></td>
								<td><input type="text" class="form-control"  name="description<?=$i?>" value="<?=$row_pr['description']?>"></td>
							</tr>
							<?}?>
							</tbody>
							</table>
						</div>
						<div class="form-group has-warning">
							<label><i class="fa fa-bell-o"></i> Correction</label>
							<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="correction" id="inputWarning"><?=$row_req_header['correction']?></textarea>
						</div>
						
					  </div>
					 
					  
					  <!-- /.box-body -->

					  <div class="box-footer">
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">&nbsp;&nbsp;
						<input type="submit" class="btn btn-primary" name="publish" value="Publish">
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
							$update=$query("update tbl_sp_header SET published='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							
							$update=$query("update tbl_sp_header SET published='1' where id='$_GET[id]'");
							if($update){
								
							}
						}
					
					if($_GET['action']=='delete'){
						$delete=$query("delete from tbl_sp_header where id='$_GET[id]'");
						if($delete){
							$del=$query("delete from tbl_sp_item where sp_header='$_GET[id]'");
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
							  <th>Sts</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_req=$query("select * from tbl_sp_header order by id DESC");
							while($row_req=$fetch($query_req)){
							$query_item=$query("select * from tbl_sp_item where sp_header='$row_req[id]' and item!=0");
							$jml_item=$rows($query_item);
							$item=number_format($jml_item);
							$approve=$row_req['approve1']+$row_req['approve2']+$row_req['approve3'];
							$nourut++;
							//published
							if($row_req['published']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_req[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_req[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
							//approve
							if(empty($row_req['approve1'])){
								$approve1="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve1="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_req['approve2'])){
								$approve2="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve2="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_req['approve3'])){
								$approve3="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve3="<img src='$template/dist/img/ceklist.png'>";
							}
							//end approve
							
							//approve status
							if($approve==3){
								$update=$query("update tbl_sp_header SET status='1' where id='$row_req[id]'");
								if($row_req['correction']=='RO-CREATED'){
									$status="<small class='label center bg-green'>COMPLETE</small>";
								}else{
									$status="<small class='label center bg-green'>COMPLETE</small>";
								}
								
							}
							else{
								$status="<small class='label center bg-red'>ON PROCESS</small>";
							}
							//Correction
							if(!empty($row_req['correction_by'])){
									$correction="<small class='label pull-right bg-red'>correction</small>";
							}else{$correction="";}
							//end correction
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left"><a href="print-product.php?id=<?=$row_req['id']?>" target="_blank">#<?=sprintf('%03d',$row_req['id'])?></a>
										<?=$correction?>
										</td>
										<td align="left"><?=$row_req['title']?></td>
										<td align="center"><?=$item?></td>
										<td align="center"><?=$published?></td>
										<td align="center"><?=$approve1?></td>
										<td align="center"><?=$approve2?></td>
										<td align="center"><?=$approve3?></td>
										<td align="center"><?=$status?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_req['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
											<a href="#" onClick='confirmation(<?=$row_req['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
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