<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	Finance Department
  </h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="#">Finance Department</a></li>
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
					Bank Account					
				</h3>
			  
			  <div class="pull-right">
			  <a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&open=<?=$_GET['open']?>">ADD DATA</a> | 
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
					$query_bank=$query("select * from tbl_bank where id='$_GET[id]'");
					$row_bank=$fetch($query_bank);
					if(isset($_POST['submit'])){
						if(empty($_POST['bank'])  || empty($_POST['acc_name']) || empty($_POST['acc_number'])){
						?>
							<div class="box-body">
								<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-ban"></i> Message:</h4>
									Empty field!
								</div>
							</div>
						<?
						}
						else{
							if($_GET['edit']==0){
								$values="'',";//id
								$values.="'$_POST[bank]',";//bank
								$values.="'$_POST[acc_name]',";//acc_name
								$values.="'$_POST[acc_number]',";//acc_number
								$values.="'$_POST[office]',";//office
								$values.="'$_POST[note]',";//note
								$values.="'1'";//status
								$insert=$query("insert into tbl_bank values($values)");
								if($insert){
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&open=$_GET[open]&msg=sks'>";
								}
								else{echo mysql_error();}
							}
							else{
								$values="bank='$_POST[bank]',";//bank
								$values.="acc_name='$_POST[acc_name]',";//acc_name
								$values.="acc_number='$_POST[acc_number]',";//acc_number
								$values.="acc_number='$_POST[office]',";//office
								$values.="note='$_POST[note]'";//note
								$insert=$query("update tbl_bank SET $values where id='$_GET[id]'");
								if($insert){
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
					  <div class="col-md-6" style="padding-left:0px;">
						<div class="form-group">
							<label for="exampleInputEmail1">Name of Bank</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter bank name" name="bank" value="<?=$row_bank['bank']?>">
						</div>
					  </div>
					  
					  
					 <div class="col-md-6" style="padding-left:0px;">
						<div class="form-group">
							<label>Account Name</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter account name" name="acc_name" value="<?=$row_bank['acc_name']?>">
							
						</div>
					  </div>
					  
					  <div class="col-md-6" style="padding-left:0px;">
						<div class="form-group">
							<label>Account Number</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter account number" name="acc_number" value="<?=$row_bank['acc_number']?>">
							
						</div>
					  </div>
					  <div class="col-md-6" style="padding-left:0px;">
						<div class="form-group">
							<label>Branch Office</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter branch office" name="office" value="<?=$row_bank['office']?>">
							
						</div>
					  </div>
					  <div class="col-md-12" style="padding-left:0px;">
						<div class="form-group has-warning">
							<label><i class="fa fa-bell-o"></i> Note</label>
							<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="note" id="inputWarning"><?=$row_bank['note']?></textarea>
						</div>
					  </div>
					</div> 
					  
					  <!-- /.box-body -->
					
					  <div class="box-footer">
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">
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
							$update=$query("update tbl_bank SET status='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							
							$update=$query("update tbl_bank SET status='1' where id='$_GET[id]'");
							if($update){
								
							}
						}
					
					if($_GET['action']=='delete'){
						$delete=$query("delete from tbl_bank where id='$_GET[id]'");
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
							  <th>Bank</th>
							  <th>Account Name</th>
							  <th>Account Number</th>
							  <th>Office</th>
							  <th>Published</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_bank=$query("select * from tbl_bank order by id DESC");
							while($row_bank=$fetch($query_bank)){
							
							$nourut++;
							//published
							if($row_bank['status']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_bank[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_bank[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left"><?=$row_bank['bank']?></td>
										<td align="left"><?=$row_bank['acc_name']?></td>
										<td align="left"><?=$row_bank['acc_number']?></td>
										<td align="left"><?=$row_bank['office']?></td>
										<td align="center"><?=$published?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_bank['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
											<a href="#" onClick='confirmation(<?=$row_bank['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
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