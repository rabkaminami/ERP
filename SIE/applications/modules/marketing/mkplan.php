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
					Marketing Plan
					
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
				default:?>
					<?php
					$category=$_GET['l'];
					$query_mkplan=$query("select * from tbl_mkplan where id='$_GET[id]'");
					$row_mkplan=$fetch($query_mkplan);
					?>
					<?php
					if(isset($_POST['submit'])){
						if(empty($_POST['title']) || empty($_POST['year']) || empty($_POST['month']) || empty($_POST['week'])){
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
								if(isset($_POST['submit']) && !$errors) 
								{
									$values="'',";//id
									$values.="'$_POST[title]',";//title
									$values.="'$_POST[year]',";//year
									$values.="'$_POST[month]',";//mounth
									$values.="'$_POST[week]',";//correction
									$values.="'$_POST[description]',";//value
									$values.="'$_POST[published]',";//published
									$values.="'1'";//status
									$insert=$query("insert into tbl_mkplan values($values)");
									if($insert){
										echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&open=$_GET[open]&msg=sks'>";
									}
									else{echo mysql_error();}
								}
							}
							else{
								$values="title='$_POST[title]',";
								$values.="year='$_POST[year]',";
								$values.="month='$_POST[month]',";
								$values.="description='$_POST[description]',";
								$values.="week='$_POST[week]',";
								$values.="published='$_POST[published]'";
								$update=$query("update tbl_mkplan SET $values where id='$_GET[id]'");
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
					<form action="" method="post" enctype="multipart/form-data">
					  <div class="box-body">
						<div class="form-group" style="height:55px;">
							<div style="width:32%;float:left;height:50px;">
								<label for="exampleInputEmail1">Years</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter year" name="year" value="<?=$row_mkplan['year']?>">
							</div>
							<div style="width:32%;float:left;height:50px;margin-left:10px;">
								<label for="exampleInputEmail1">Month</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter mounth" name="month" value="<?=$row_mkplan['month']?>">
							</div>
							<div style="width:34%;float:left;height:50px;margin-left:10px;">
								<label for="exampleInputEmail1">Weeks</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter weeks" name="week" value="<?=$row_mkplan['week']?>">
							</div>
						  
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1">Title</label>
						  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name="title" value="<?=$row_mkplan['title']?>">
						</div>
						 <div class="form-group">
							<label>Description</label>
							<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description"><?=$row_mkplan['description']?></textarea>
						</div>
						<div class="form-group">
							<label>Published</label><br>
							<label style="font-weight:normal;">
							  <input type="radio" name="published" id="optionsRadios1" value="1"  <?php if($_GET['edit']==0){}else{if($row_mkplan['published']==1){echo"checked";}}?>>Yes
							 </label> / 
							 <label style="font-weight:normal;">
							  <input type="radio" name="published" id="optionsRadios1" value="0" <?php if($_GET['edit']==0){echo"checked";}else{if($row_mkplan['published']==0){echo"checked";}}?>>No
							 </label>
					    </div>
					
					  </div>
					 
					  
					  <!-- /.box-body -->

					  <div class="box-footer">
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">
					  </div>
					</form>
				<?break;
				case 'list':?>
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
							$update=$query("update tbl_mkplan SET published='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							$update=$query("update tbl_mkplan SET published='1' where id='$_GET[id]'");
						}
					if($_GET['action']=='delete'){
						$delete=$query("delete from tbl_mkplan where id='$_GET[id]'");
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
							  <th>Year</th>
							  <th>Month</th>
							  <th>Week</th>
							  <th>Description</th>
							  <th>Published</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_mkplan=$query("select * from tbl_mkplan order by id DESC");
							while($row_mkplan=$fetch($query_mkplan)){
							$nourut++;
							//published
							if($row_mkplan['published']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_mkplan[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_mkplan[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left">#<?=sprintf('%03d',$row_mkplan['id'])?></td>
										<td align="left"><?=$row_mkplan['title']?></td>
										<td align="left"><?=$row_mkplan['year']?></td>
										<td align="left"><?=$row_mkplan['month']?></td>
										<td align="center"><?=$row_mkplan['week']?></td>
										<td align="center"><?=$row_mkplan['description']?></td>
										<td align="center"><?=$published?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_mkplan['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
											<a href="#" onClick='confirmation(<?=$row_mkplan['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
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