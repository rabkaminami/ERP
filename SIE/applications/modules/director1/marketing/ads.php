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
					<?php 
						if($_GET['l']=='print'){?>Print Ads<?}
						if($_GET['l']=='tv'){?>TV Ads<?}
						if($_GET['l']=='radio'){?>Radio Ads<?}
						if($_GET['l']=='fb'){?>Facebook Ads<?}
						if($_GET['l']=='google'){?>Google Ads<?}
					?>
					
				</h3>
			  
			  <div class="pull-right">
				<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=list&open=<?=$_GET['open']?>">DATA LIST</a>
			  </div>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<?php
			switch($_GET['p']){
				case'add':?>
					<?php
					$category=$_GET['l'];
					$date=date("m/d/Y")." ".date("h:i:s");
					$tg=str_replace(" ","",$_POST['start_from']);
					$pecah=explode("-",$tg);
					$start=$pecah[0];
					$from=$pecah[1];
					$query_ads=$query("select * from tbl_ads where id='$_GET[id]' and category='$category'");
					$row_ads=$fetch($query_ads);
					$tgl=$row_ads['start_date']."-".$row_ads['end_date'];
					?>
					
					<?php
					if(isset($_POST['approve'])){
						$values="title='$_POST[title]',";
						$values.="name='$_POST[name]',";
						$values.="description='$_POST[description]',";
						$values.="correction='$_POST[correction]',";
						$values.="published='$_POST[published]',";
						$values.="approve2='1',";
						$values.="correction_by='0',";
						$values.="start_date='$start',";
						$values.="end_date='$from',";
						$values.="updated_by='$S_userid',";
						$values.="updated_date='$date'";
						$update=$query("update tbl_ads SET $values where id='$_GET[id]' and category='$category'");
						if($update){
							echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&mm=$_GET[mm]&s=$_GET[s]&l=$_GET[l]&p=list&open=$_GET[open]&msg=sks'>";
							
						}
					}
					if(isset($_POST['submit'])){
						if(empty($_POST['title']) || empty($_POST['name']) || empty($_POST['title'])){
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
							if($_GET['edit']==1){
								$values="title='$_POST[title]',";
								$values.="name='$_POST[name]',";
								$values.="value='$_POST[value]',";
								$values.="description='$_POST[description]',";
								$values.="correction='$_POST[correction]',";
								$values.="correction_by='$S_userid',";
								$values.="published='$_POST[published]',";
								$values.="start_date='$start',";
								$values.="end_date='$from',";
								$values.="updated_by='$S_userid',";
								$values.="updated_date='$date'";
								$update=$query("update tbl_ads SET $values where id='$_GET[id]' and category='$category'");
								if($update){
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=list&open=$_GET[open]&msg=sks'>";
									
								}
								else{echo mysql_error();}
								
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
					<?php
					if(!empty($row_ads['image'])){
					?>
						<img src="upload/<?=$row_ads['image']?>">
					<?
					}
					?>
					<form action="" method="post" enctype="multipart/form-data">
					  <div class="box-body">
						<div class="form-group">
						  <label for="exampleInputEmail1">Title</label>
						  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name="title" value="<?=$row_ads['title']?>">
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1">Media Name</label>
						  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name" value="<?=$row_ads['name']?>">
						</div>
						<div class="form-group">
							<label>Date range:</label>

							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" name="start_from" class="form-control pull-right" id="reservation" value="<?=$tgl?>">
							</div>
							<!-- /.input group -->
						</div>
							<div class="form-group">
							<label>Value</label>
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" name="value" class="form-control" value="<?=$row_ads['value']?>">
								<span class="input-group-addon">.00</span>
							</div>
						</div>
						 <div class="form-group">
							<label>Description</label>
							<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description"><?=$row_ads['description']?></textarea>
						</div>
						<div class="form-group has-warning">
							<label><i class="fa fa-bell-o"></i> Correction</label>
							<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="correction" id="inputWarning"><?=$row_ads['correction']?></textarea>
						</div>
						<div class="form-group">
							<label>Published</label><br>
							<label style="font-weight:normal;">
							  <input type="radio" name="published" id="optionsRadios1" value="1"  <?php if($_GET['edit']==0){}else{if($row_ads['published']==1){echo"checked";}}?>>Yes
							 </label> / 
							 <label style="font-weight:normal;">
							  <input type="radio" name="published" id="optionsRadios1" value="0" <?php if($_GET['edit']==0){echo"checked";}else{if($row_ads['published']==0){echo"checked";}}?>>No
							 </label>
					    </div>
					
					  </div>
					 
					  
					  <!-- /.box-body -->

					  <div class="box-footer">
						<input type="submit" class="btn btn-primary" name="submit" value="Correction">
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
							$update=$query("update tbl_ads SET published='0' where id='$_GET[id]' and category='$_GET[l]'");
						}
						if($_GET['action']=='published'){
							$update=$query("update tbl_ads SET published='1' where id='$_GET[id]' and category='$_GET[l]'");
						}
					if($_GET['action']=='delete'){
						$query_exist=$query("select image from tbl_ads where id='$_GET[id]' and category='$_GET[l]'");
						$row_exist=$fetch($query_exist);
						$imagez="upload/$row_exist[image]";
						unlink($imagez);
						$delete=$query("delete from tbl_ads where id='$_GET[id]' and category='$_GET[l]'");
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
							  <th>name</th>
							  <th>Date Range</th>
							  <th>Published</th>
							  <th>Approve 1</th>
							  <th>Approve 2</th>
							  <th>Status</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_ads=$query("select * from tbl_ads where category='$_GET[l]' and published='1' and approve1='1' and approve2='0' order by id DESC");
							while($row_ads=$fetch($query_ads)){
							$approve=$row_ads['approve1']+$row_ads['approve2'];
							$tgl=$row_ads['start_date']."-".$row_ads['end_date'];
							$nourut++;
							//published
							if($row_ads['published']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_ads[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_ads[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
							
							//approve
							if(empty($row_ads['approve1'])){
								$approve1="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve1="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_ads['approve2'])){
								$approve2="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve2="<img src='$template/dist/img/ceklist.png'>";
							}
							//end approve
							
							//approve status
							if($approve==2){
								$status="<img src='$template/dist/img/ceklist.png'>";	
							}
							else{
								$status="<img src='$template/dist/img/silang.png'>";
							}
							//end approve status
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left">#<?=sprintf('%03d',$row_ads['id'])?></td>
										<td align="left"><?=$row_ads['title']?></td>
										<td align="left"><?=$row_ads['name']?></td>
										<td align="left"><?=$tgl?></td>
										<td align="center"><?=$published?></td>
										<td align="center"><?=$approve1?></td>
										<td align="center"><?=$approve2?></td>
										<td align="center"><?=$status?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_ads['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
											<a href="#" onClick='confirmation(<?=$row_ads['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
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