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
					Saldo					
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
					
					$query_saldo=$query("select * from tbl_saldo where id='$_GET[id]'");
					$row_saldo=$fetch($query_saldo);
					if($_GET['edit']==0){
						$tgl=date("d/m/Y");
					}else{$tgl=$row_saldo['date'];}
					
					if(isset($_POST['submit'])){
						if(empty($_POST['title'])){
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
								$values.="'$_POST[title]',";//title
								$values.="'$_POST[bank]',";//bank
								$values.="'$_POST[saldo]',";//saldo
								$values.="'$_POST[date]',";//date
								$values.="'$_POST[note]',";//note
								$values.="'1'";//status
								$insert=$query("insert into tbl_saldo values($values)");
								if($insert){
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&open=$_GET[open]&msg=sks'>";
								}
								else{echo mysql_error();}
							}
							else{
								$values="title='$_POST[title]',";//title
								$values.="bank='$_POST[bank]',";//bank
								$values.="saldo='$_POST[saldo]',";//saldo
								$values.="date='$_POST[date]',";//date
								$values.="note='$_POST[note]'";//note
								$insert=$query("update tbl_saldo SET $values where id='$_GET[id]'");
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
							<label for="exampleInputEmail1">Title</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name="title" value="<?=$row_saldo['title']?>">
						</div>
					  </div>
					  
					  
					 <div class="col-md-6" style="padding-left:0px;">
						<div class="form-group">
							<label>Bank</label>
							<select name="bank" class="form-control select2">
								<option value="0">Cash</option>
								<?php
								$query_bank=$query("select * from tbl_bank order by bank");
								while($row_bank=$fetch($query_bank)){
								?><option value="<?=$row_bank['id']?>" <?php if($row_bank['id']==$row_saldo['bank']){?>selected<?}?>><?=$row_bank['bank']?></option><?
								}?>
							</select>
							
						</div>
					  </div>
					  
					  <div class="col-md-6" style="padding-left:0px;">
						<div class="form-group">
							<label>Saldo</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter saldo" name="saldo" value="<?=$row_saldo['saldo']?>">
							
						</div>
					  </div>
					  <div class="col-md-6" style="padding-left:0px;">
						<div class="form-group">
							<label>Date</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" name="date" value="<?=$tgl?>" data-mask>
							</div>
							
						</div>
					  </div>
					  <div class="col-md-12" style="padding-left:0px;">
						<div class="form-group has-warning">
							<label><i class="fa fa-bell-o"></i> Note</label>
							<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; padding: 10px;" name="note" id="inputWarning"><?=$row_saldo['note']?></textarea>
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
							$update=$query("update tbl_saldo SET status='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							
							$update=$query("update tbl_saldo SET status='1' where id='$_GET[id]'");
							if($update){
								
							}
						}
					
					if($_GET['action']=='delete'){
						$delete=$query("delete from tbl_saldo where id='$_GET[id]'");
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
							  <th>Title</th>
							  <th>Bank</th>
							  <th>Saldo</th>
							  <th>Date</th>
							  <th>Published</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_saldo=$query("select * from tbl_saldo order by id DESC");
							while($row_saldo=$fetch($query_saldo)){
							$query_bank=$query("select * from tbl_bank where id='$row_saldo[bank]'");
							$row_bank=$fetch($query_bank);
							$nourut++;
							//published
							if($row_saldo['status']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_saldo[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_saldo[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left"><?=$row_saldo['title']?></td>
										<td align="left"><?php if(empty($row_saldo['bank'])){?>Cash Money<?}else{?><?=$row_bank['bank']?><?}?></td>
										<td align="left">Rp. <?=number_format($row_saldo['saldo'],0,'','.')?></td>
										<td align="left"><?=$row_saldo['date']?></td>
										<td align="center"><?=$published?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_saldo['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
											<a href="#" onClick='confirmation(<?=$row_saldo['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
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