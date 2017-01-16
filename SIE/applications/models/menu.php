<ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
		<?php
		include("applications/modules/usercontrol/access.php");
		?>
		<?php
		if($access1){?>
			<li class="<?php if($_GET['open']==1 || empty($_GET['open'])){?>active<?}?> treeview">
			  <a href="#">
				<i class="fa fa-dashboard"></i> <span>Dashboard</span>
			  </a>
			</li>
		<?}?>
		
		<?php
		if($access2){?>
			<li class="treeview <?php if($_GET['open']==2){?>active<?}?>">
			  <a href="#">
				<i class="fa fa-files-o"></i>
				<span>Marketing Department</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li class="treeview <?php if($_GET['s']=='submissions'){?>active<?}?>"><a href="#"><i class="fa fa-circle-o"></i> <span>Submissions</span>
				<i class="fa fa-angle-left pull-right"></i>
				</a>
					<ul class="treeview-menu">
						<li class="treeview"><a href="?m=marketing&s=submissions&l=product&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='product'){?>text-red<?}?>"></i> New Product</a></li>
						<li class="treeview"><a href="?m=marketing&s=submissions&l=catalog&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='catalog'){?>text-red<?}?>"></i> Catalog</a></li>
						<li class="treeview"><a href="?m=marketing&s=submissions&l=promomaterials&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='promomaterials'){?>text-red<?}?>"></i> Promotional Materials</a></li>
					</ul>
				</li>
				<li class="treeview <?php if($_GET['s']=='ads'){?>active<?}?>"><a href="#"><i class="fa fa-circle-o"></i> Advertising
					<i class="fa fa-angle-left pull-right"></i>
				</a>
					<ul class="treeview-menu">
						<li><a href="?m=marketing&s=ads&l=print&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='print'){?>text-red<?}?>"></i> Print Ads</a></li>
						<li><a href="?m=marketing&s=ads&l=tv&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='tv'){?>text-red<?}?>"></i> TV Ads</a></li>
						<li><a href="?m=marketing&s=ads&l=radio&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='radio'){?>text-red<?}?>"></i> Radio Ads</a></li>
						<li><a href="?m=marketing&s=ads&l=fb&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='fb'){?>text-red<?}?>"></i> Facebook Ads</a></li>
						<li><a href="?m=marketing&s=ads&l=google&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='google'){?>text-red<?}?>"></i> Google Ads</a></li>
					  </ul>
					  
				</li>
				<li class="treeview <?php if($_GET['s']=='mkplan'){?>active<?}?>"><a href="?m=marketing&s=mkplan&l=mkplan&open=2"><i class="fa fa-circle-o"></i> Marketing Plan</a></li>
			  </ul>
			</li>
		<?}?>
		
		<?php
		if($access3){?>
        <li class="treeview <?php if($_GET['open']==3){?>active<?}?>">
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Purchasing Department</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
			 <li><a href="?m=purchasing&s=purchasing&l=product&open=3"><i class="fa fa-circle-o <?php if($_GET['l']=='product'){?>text-red<?}?>"></i> New Product</a></li>
            <li><a href="?m=purchasing&s=purchasing&l=request&open=3"><i class="fa fa-circle-o <?php if($_GET['l']=='request'){?>text-red<?}?>"></i> Request Order</a></li>
            <li><a href="?m=purchasing&s=purchasing&l=po&open=3"><i class="fa fa-circle-o <?php if($_GET['l']=='po'){?>text-red<?}?>"></i> Purchase Order</a></li>
           <!-- <li><a href="?m=purchasing&s=purchasing&l=do&open=3"><i class="fa fa-circle-o <?php if($_GET['l']=='do'){?>text-red<?}?>"></i> Delivery Order</a></li>-->
			<li><a href="?m=purchasing&s=purchasing&l=materials&open=3"><i class="fa fa-circle-o <?php if($_GET['l']=='materials'){?>text-red<?}?>"></i> Materials</a></li>
            <li><a href="?m=purchasing&s=purchasing&l=suppliers&open=3"><i class="fa fa-circle-o <?php if($_GET['l']=='suppliers'){?>text-red<?}?>"></i> Suppliers</a></li>
			 <li><a href="?m=purchasing&s=purchasing&l=pricelist&open=3"><i class="fa fa-circle-o <?php if($_GET['l']=='pricelist'){?>text-red<?}?>"></i> Price List</a></li>
          </ul>
        </li>
		<?}?>
		
		<?php
		if($access4){?>
		<li class="treeview <?php if($_GET['open']==4){?>active<?}?>">
          <a href="#">
            <i class="fa fa-share"></i> <span>Operations Department</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="treeview"><a href="?m=operations&s=operations&l=production_planning&open=4"><i class="fa fa-circle-o <?php if($_GET['l']=='production_planning'){?>text-red<?}?>"></i> Production Planning</a></li>
            <li class="treeview <?php if($_GET['s']=='process'){?>active<?}?>">
              <a href="#"><i class="fa fa-circle-o"></i> Process Operation <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="?m=operations&s=process&l=cuting&open=4"><i class="fa fa-circle-o <?php if($_GET['l']=='cuting'){?>text-red<?}?>"></i>Cuting</a></li>
				<li><a href="?m=operations&s=process&l=sewing&open=4"><i class="fa fa-circle-o <?php if($_GET['l']=='sewing'){?>text-red<?}?>"></i>Sewing</a></li>
                <li>
                  <a href="?m=operations&s=process&l=finishing&open=4"><i class="fa fa-circle-o <?php if($_GET['l']=='finishing'){?>text-red<?}?>"></i> Finishing</a>
                </li>
              </ul>
            </li>
			<li><a href="?m=operations&s=operations&l=product&open=4"><i class="fa fa-circle-o <?php if($_GET['l']=='product'){?>text-red<?}?>"></i> Products</a></li>
          </ul>
        </li>
		<?}?>
		
		<?php
		if($access5){?>
		
		<li class="treeview <?php if($_GET['open']==5){?>active<?}?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Warehousing Department</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
			<li class="treeview <?php if($_GET['open']==5){?>active<?}?>">
			  <a href="?m=warehouse&s=do&l=do&open=5">
				<i class="fa fa-circle-o <?php if($_GET['l']=='do'){?>text-red<?}?>"></i> <span>Delivery Order</span>
				</a>
			</li>
			<li class="treeview <?php if($_GET['s']=='dm'){?>active<?}?>"><a href="?m=warehouse&s=warehouse&l=dm&open=5" title=""><i class="fa fa-circle-o <?php if($_GET['l']=='dm'){?>text-red<?}?>"></i> Requesting Materials <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="?m=warehouse&s=dm&l=req&open=5"><i class="fa fa-circle-o <?php if($_GET['l']=='req'){?>text-red<?}?>"></i> Request</a></li>
					<li><a href="?m=warehouse&s=dm&l=confirm&open=5"><i class="fa fa-circle-o <?php if($_GET['l']=='confirm'){?>text-red<?}?>"></i> Confirm</a></li>
				</ul>
			</li>
			<li class="treeview <?php if($_GET['s']=='rmw'){?>active<?}?>"><a href="#" title="Raw Material Warehouse"><i class="fa fa-circle-o"></i> RMW <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="?m=warehouse&s=rmw&l=rm&open=5"><i class="fa fa-circle-o <?php if($_GET['l']=='rm'){?>text-red<?}?>"></i> Materials</a></li>
					<li><a href="?m=warehouse&s=rmw&l=cuting&open=5"><i class="fa fa-circle-o <?php if($_GET['l']=='cuting'){?>text-red<?}?>"></i> Cuting</a></li>
					<li><a href="?m=warehouse&s=rmw&l=sewing&open=5"><i class="fa fa-circle-o <?php if($_GET['l']=='sewing'){?>text-red<?}?>"></i> Sewing</a></li>
				</ul>
			</li>
			<li class="treeview <?php if($_GET['s']=='fgw'){?>active<?}?>"><a href="#" title="Finish Goods Warehouse"><i class="fa fa-circle-o"></i> FGW <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="?m=warehouse&s=fgw&l=finishing&open=5"><i class="fa fa-circle-o <?php if($_GET['l']=='finishing'){?>text-red<?}?>"></i> Finishing</a></li>
					<li><a href="?m=warehouse&s=fgw&l=product&open=4"><i class="fa fa-circle-o <?php if($_GET['l']=='product'){?>text-red<?}?>"></i> Products</a></li>
				</ul>
			</li>
			<li class="treeview <?php if($_GET['s']=='bs'){?>active<?}?>"><a href="#" title="Finish Goods Warehouse"><i class="fa fa-circle-o"></i> Buffer Stock<i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="?m=warehouse&s=bs&l=op&open=5"><i class="fa fa-circle-o <?php if($_GET['l']=='op'){?>text-red<?}?>"></i> Operations</a></li>
					<li><a href="?m=warehouse&s=bs&l=fn&open=5"><i class="fa fa-circle-o <?php if($_GET['l']=='fn'){?>text-red<?}?>"></i> Finance</a></li>
					<li><a href="?m=warehouse&s=bs&l=mkt&open=5"><i class="fa fa-circle-o <?php if($_GET['l']=='mkt'){?>text-red<?}?>"></i> Marketing</a></li>
				</ul>
			</li>
          </ul>
        </li>
		<?}?>
		
		<?php
		if($access6){?>
        <li class="treeview <?php if($_GET['open']==6){?>active<?}?>">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Finance Department</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="?m=finance&s=summary&l=summary&open=6"><i class="fa fa-circle-o <?php if($_GET['s']=='summary'){?>text-red<?}?>"></i> Summary</a></li>
			<li><a href="?m=finance&s=po&l=po&open=6"><i class="fa fa-circle-o <?php if($_GET['s']=='po'){?>text-red<?}?>"></i> PO</a></li>
            <li><a href="?m=finance&s=rpm&l=rpm&open=6"><i class="fa fa-circle-o <?php if($_GET['s']=='rpm'){?>text-red<?}?>"></i> RPM</a></li>
          </ul>
        </li>
		<?}?>
		
		<?php
		if($access7){?>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Accounting Department</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> General Ledger</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Accounts Receivable</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Accounts Payable</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Reports</a></li>
          </ul>
        </li>
		<?}?>
		
		<?php
		if($access8){?>
		<li class="<?php if($_GET['open']==8){?>active<?}?> treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Data Master</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
			<li><a href="?m=org&s=add&open=8"><i class="fa fa-circle-o <?php if($_GET['m']=='org'){?>text-red<?}?>"></i> Organization</a></li>
			<li><a href="?m=finance&s=account&l=account&p=add&open=8"><i class="fa fa-circle-o <?php if($_GET['m']=='finance'){?>text-red<?}?>"></i> Account Bank</a></li>
			<li><a href="?m=finance&s=saldo&l=saldo&p=add&open=8"><i class="fa fa-circle-o <?php if($_GET['m']=='saldo'){?>text-red<?}?>"></i> Saldo</a></li>
            <li><a href="?m=user&s=add&open=8"><i class="fa fa-circle-o <?php if($_GET['m']=='user'){?>text-red<?}?>"></i> User</a></li>
			<li><a href="?m=department&s=add&open=8"><i class="fa fa-circle-o <?php if($_GET['m']=='department'){?>text-red<?}?>"></i> Department</a></li>
			<li><a href="?m=employee&s=add&open=8"><i class="fa fa-circle-o <?php if($_GET['m']=='employee'){?>text-red<?}?>"></i> Employee</a></li>
			<li><a href="?m=supplyer&s=add&open=8"><i class="fa fa-circle-o <?php if($_GET['m']=='supplyer'){?>text-red<?}?>"></i> Supplyer</a></li>
          </ul>
        </li>
		<?}?>
		
		<?php
		if($access9){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>Setting System</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
		<?}?>
        
        <?php
		if($access10){?>
        <li class="treeview">
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Backup Data</span>
          </a>
        </li>
		<?}?>
		
		<?php
		if($access11){?>
        <li class="<?php if($_GET['open']==11){?>active<?}?> treeview">
          <a href="?m=user&s=list&open=11">
            <i class="fa fa-user"></i> <span>User Control</span>
          </a>
        </li>
        <?}?>
		<?php
		if($access12){?>
		   <li class="treeview <?php if($_GET['open']==2){?>active<?}?>">
				  <a href="#">
					<i class="fa fa-files-o"></i>
					<span>Marketing Department</span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
				  <ul class="treeview-menu">
					<li class="treeview <?php if($_GET['s']=='submissions'){?>active<?}?>"><a href="#"><i class="fa fa-circle-o"></i> <span>Submissions</span>
					<i class="fa fa-angle-left pull-right"></i>
					</a>
						<ul class="treeview-menu">
							<li class="treeview"><a href="?m=director&mm=marketing&s=submissions&l=product&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='product'){?>text-red<?}?>"></i> 
							<span>New Product</span>
							<?php
							$query_sub=$query("select * from tbl_sp_header where published='1' and approve2='0'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>	
							</a></li>
							<li class="treeview"><a href="?m=director&mm=marketing&s=submissions&l=catalog&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='catalog'){?>text-red<?}?>"></i> Catalog
							<?php
							$query_sub=$query("select * from tbl_submissions where published='1' and approve1='0' and category='catalog'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>	
							</a>
							</li>
							<li class="treeview"><a href="?m=director&mm=marketing&s=submissions&l=promomaterials&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='promomaterials'){?>text-red<?}?>"></i> Promotional Materials 
							<?php
							$query_sub=$query("select * from tbl_submissions where published='1' and approve1='0' and category='promomaterials'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>
							</a></li>
						</ul>
					</li>
					<li class="treeview <?php if($_GET['s']=='ads'){?>active<?}?>"><a href="#"><i class="fa fa-circle-o"></i> Advertising
						<i class="fa fa-angle-left pull-right"></i>
					</a>
						<ul class="treeview-menu">
							<li><a href="?m=director&mm=marketing&s=ads&l=print&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='print'){?>text-red<?}?>"></i> Print Ads
							<?php
							$query_sub=$query("select * from tbl_ads where published='1' and approve1='0' and category='print'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>
							</a></li>
							<li><a href="?m=director&mm=marketing&s=ads&l=tv&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='tv'){?>text-red<?}?>"></i> TV Ads
							<?php
							$query_sub=$query("select * from tbl_ads where published='1' and approve1='0' and category='tv'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>
							</a></li>
							<li><a href="?m=director&mm=marketing&s=ads&l=radio&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='radio'){?>text-red<?}?>"></i> Radio Ads
							<?php
							$query_sub=$query("select * from tbl_ads where published='1' and approve1='0' and category='radio'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>
							</a></li>
							<li><a href="?m=director&mm=marketing&s=ads&l=fb&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='fb'){?>text-red<?}?>"></i> Facebook Ads
							<?php
							$query_sub=$query("select * from tbl_ads where published='1' and approve1='0' and category='fb'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>
							</a></li>
							<li><a href="?m=director&mm=marketing&s=ads&l=google&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='google'){?>text-red<?}?>"></i> Google Ads
							<?php
							$query_sub=$query("select * from tbl_ads where published='1' and approve1='0' and category='google'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>
							</a></li>
						  </ul>
						  
					</li>
					<li><a href="#"><i class="fa fa-circle-o"></i> Marketing Plan</a></li>
				  </ul>
				</li>
				<li class="treeview <?php if($_GET['open']==3){?>active<?}?>">
				  <a href="pages/widgets.html">
					<i class="fa fa-th"></i> <span>Purchasing Department</span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="?m=director&mm=purchasing&s=purchasing&l=request&open=3"><i class="fa fa-circle-o <?php if($_GET['l']=='request'){?>text-red<?}?>"></i> Request Order
						<?php
						$query_req=$query("select * from tbl_request_header where published='1' and approve2='0'");
						$jml_req=$rows($query_req);
						?>
						<?php if(!empty($jml_req)){?><small class="label pull-right bg-red"><?=$jml_req?></small><?}?>
					</a></li>
					<li><a href="?m=director&mm=purchasing&s=purchasing&l=po&open=3"><i class="fa fa-circle-o <?php if($_GET['l']=='po'){?>text-red<?}?>"></i> Purchase Order
						<?php
						$query_po=$query("select * from tbl_po_header where published='1' and approve1='1' and approve2='0' and approve3='0'");
						$jml_po=$rows($query_po);
						?>
						<?php if(!empty($jml_po)){?><small class="label pull-right bg-red"><?=$jml_po?></small><?}?>
					 </a></li>
				  </ul>
				</li>
				<li class="treeview <?php if($_GET['open']==4){?>active<?}?>">
				  <a href="#">
					<i class="fa fa-share"></i> <span>Operations Department</span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
				  <ul class="treeview-menu">
					<li class="treeview"><a href="?m=director&mm=operations&s=operations&l=production_planning&open=4"><i class="fa fa-circle-o <?php if($_GET['l']=='production_planning'){?>text-red<?}?>"></i> Production Planning
						<?php
						$query_pp=$query("select * from tbl_production_planning where published='1' and approve2='0'");
						$jml_pp=$rows($query_pp);
						?>
						<?php if(!empty($jml_pp)){?><small class="label pull-right bg-red"><?=$jml_pp?></small><?}?>
					</a></li>
				  </ul>
				</li>
				<li class="treeview <?php if($_GET['open']==6){?>active<?}?>">
				  <a href="#">
					<i class="fa fa-pie-chart"></i>
					<span>Finance Department</span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="?m=director&mm=finance&s=rpm&l=rpm&open=6"><i class="fa fa-circle-o <?php if($_GET['s']=='rpm'){?>text-red<?}?>"></i> RPM
						<?php
						$query_rpm=$query("select * from tbl_rpm where published='1' and approve2='0'");
						$jml_rpm=$rows($query_rpm);
						?>
						<?php if(!empty($jml_rpm)){?><small class="label pull-right bg-red"><?=$jml_rpm?></small><?}?>
					</a></li>
				  </ul>
				</li>
        <?}?>
		<?php
		if($access13){?>
		   <li class="treeview <?php if($_GET['open']==2){?>active<?}?>">
				  <a href="#">
					<i class="fa fa-files-o"></i>
					<span>Marketing Department</span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
				  <ul class="treeview-menu">
					<li class="treeview <?php if($_GET['s']=='submissions'){?>active<?}?>"><a href="#"><i class="fa fa-circle-o"></i> <span>Submissions</span>
					<i class="fa fa-angle-left pull-right"></i>
					</a>
						<ul class="treeview-menu">
							<li class="treeview"><a href="?m=director1&mm=marketing&s=submissions&l=product&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='product'){?>text-red<?}?>"></i> 
							<span>New Product</span>
							<?php
							$query_sub=$query("select * from tbl_sp_header where published='1' and approve3='0'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>	
							</a></li>
							<li class="treeview"><a href="?m=director1&mm=marketing&s=submissions&l=catalog&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='catalog'){?>text-red<?}?>"></i> Catalog
							<?php
							$query_sub=$query("select * from tbl_submissions where published='1' and approve1='1' and approve2='0' and category='catalog'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>
							</a></li>
							<li class="treeview"><a href="?m=director1&mm=marketing&s=submissions&l=promomaterials&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='promomaterials'){?>text-red<?}?>"></i> Promotional Materials 
							<?php
							$query_sub=$query("select * from tbl_submissions where published='1' and approve1='1' and approve2='0' and category='promomaterials'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>
							</a></li>
						</ul>
					</li>
					<li class="treeview <?php if($_GET['s']=='ads'){?>active<?}?>"><a href="#"><i class="fa fa-circle-o"></i> Advertising
						<i class="fa fa-angle-left pull-right"></i>
					</a>
						<ul class="treeview-menu">
							<li><a href="?m=director1&mm=marketing&s=ads&l=print&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='print'){?>text-red<?}?>"></i> Print Ads
							<?php
							$query_sub=$query("select * from tbl_ads where published='1' and approve1='1' and approve2='0' and category='print'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>
							</a></li>
							<li><a href="?m=director1&mm=marketing&s=ads&l=tv&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='tv'){?>text-red<?}?>"></i> TV Ads
							<?php
							$query_sub=$query("select * from tbl_ads where published='1' and approve1='1' and approve2='0' and category='tv'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>
							</a></li>
							<li><a href="?m=director1&mm=marketing&s=ads&l=radio&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='radio'){?>text-red<?}?>"></i> Radio Ads
							<?php
							$query_sub=$query("select * from tbl_ads where published='1' and approve1='1' and approve2='0' and category='radio'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>
							</a></li>
							<li><a href="?m=director1&mm=marketing&s=ads&l=fb&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='fb'){?>text-red<?}?>"></i> Facebook Ads
							<?php
							$query_sub=$query("select * from tbl_ads where published='1' and approve1='1' and approve2='0' and category='fb'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>
							</a></li>
							<li><a href="?m=director1&mm=marketing&s=ads&l=google&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='google'){?>text-red<?}?>"></i> Google Ads
							<?php
							$query_sub=$query("select * from tbl_ads where published='1' and approve1='1' and approve2='0' and category='google'");
							$jml_sub=$rows($query_sub);
							?>
							<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>
							</a></li>
						  </ul>
						  
					</li>
					<li><a href="#"><i class="fa fa-circle-o"></i> Marketing Plan</a></li>
				  </ul>
				</li>
				<li class="treeview <?php if($_GET['open']==3){?>active<?}?>">
				  <a href="pages/widgets.html">
					<i class="fa fa-th"></i> <span>Purchasing Department</span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="?m=director1&mm=purchasing&s=purchasing&l=request&open=3"><i class="fa fa-circle-o <?php if($_GET['l']=='request'){?>text-red<?}?>"></i> Request Order
						<?php
						$query_req=$query("select * from tbl_request_header where published='1' and approve3='0'");
						$jml_req=$rows($query_req);
						?>
						<?php if(!empty($jml_req)){?><small class="label pull-right bg-red"><?=$jml_req?></small><?}?>
					</a></li>
					<li><a href="?m=director1&mm=purchasing&s=purchasing&l=po&open=3"><i class="fa fa-circle-o <?php if($_GET['l']=='po'){?>text-red<?}?>"></i> Purchase Order
						<?php
						$query_po=$query("select * from tbl_po_header where published='1' and approve1='1' and approve2='1' and approve3='0' and approve3='0'");
						$jml_po=$rows($query_po);
						?>
						<?php if(!empty($jml_po)){?><small class="label pull-right bg-red"><?=$jml_po?></small><?}?>
					 </a></li>
				  </ul>
				</li>
				<li class="treeview <?php if($_GET['open']==4){?>active<?}?>">
				  <a href="#">
					<i class="fa fa-share"></i> <span>Operations Department</span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
				  <ul class="treeview-menu">
					<li class="treeview"><a href="?m=director1&mm=operations&s=operations&l=production_planning&open=4"><i class="fa fa-circle-o <?php if($_GET['l']=='production_planning'){?>text-red<?}?>"></i> Production Planning
						<?php
						$query_pp=$query("select * from tbl_production_planning where published='1' and approve3='0'");
						$jml_pp=$rows($query_pp);
						?>
						<?php if(!empty($jml_pp)){?><small class="label pull-right bg-red"><?=$jml_pp?></small><?}?>
					</a></li>
				  </ul>
				</li>
				<li class="treeview <?php if($_GET['open']==6){?>active<?}?>">
				  <a href="#">
					<i class="fa fa-pie-chart"></i>
					<span>Finance Department</span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="?m=director1&mm=finance&s=rpm&l=rpm&open=6"><i class="fa fa-circle-o <?php if($_GET['s']=='rpm'){?>text-red<?}?>"></i> RPM
						<?php
						$query_rpm=$query("select * from tbl_rpm where published='1' and approve3='0'");
						$jml_rpm=$rows($query_rpm);
						?>
						<?php if(!empty($jml_rpm)){?><small class="label pull-right bg-red"><?=$jml_rpm?></small><?}?>
					</a></li>
				  </ul>
				</li>
        <?}?>
		
		<?php
		if($access14){?>
		<li class="treeview <?php if($_GET['open']==2){?>active<?}?>">
		  <a href="#">
			<i class="fa fa-files-o"></i>
			<span>Marketing Department</span>
			<i class="fa fa-angle-left pull-right"></i>
		  </a>
		  <ul class="treeview-menu">
			<li class="treeview <?php if($_GET['s']=='submissions'){?>active<?}?>"><a href="#"><i class="fa fa-circle-o"></i> <span>Submissions</span>
			<i class="fa fa-angle-left pull-right"></i>
			</a>
				<ul class="treeview-menu">
					<li class="treeview"><a href="?m=manager_opr&mm=marketing&s=submissions&l=product&open=2"><i class="fa fa-circle-o <?php if($_GET['l']=='product'){?>text-red<?}?>"></i> 
					<span>New Product</span>
					<?php
					$query_sub=$query("select * from tbl_sp_header where published='1' and approve1='0'");
					$jml_sub=$rows($query_sub);
					?>
					<?php if(!empty($jml_sub)){?><small class="label pull-right bg-red"><?=$jml_sub?></small><?}?>	
					</a></li>
				</ul>
			</li>
		  </ul>
		</li>
		<li class="treeview <?php if($_GET['open']==3){?>active<?}?>">
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Purchasing Department</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="?m=manager_opr&mm=purchasing&s=purchasing&l=request&open=3"><i class="fa fa-circle-o <?php if($_GET['l']=='request'){?>text-red<?}?>"></i> Request Order
				<?php
				$query_req=$query("select * from tbl_request_header where published='1' and approve1='0'");
				$jml_req=$rows($query_req);
				?>
				<?php if(!empty($jml_req)){?><small class="label pull-right bg-red"><?=$jml_req?></small><?}?>
			</a></li>
			 <li><a href="?m=manager_opr&mm=purchasing&s=purchasing&l=po&open=3"><i class="fa fa-circle-o <?php if($_GET['l']=='po'){?>text-red<?}?>"></i> Purchase Order
				<?php
				$query_po=$query("select * from tbl_po_header where published='1' and approve1='0'");
				$jml_po=$rows($query_po);
				?>
				<?php if(!empty($jml_po)){?><small class="label pull-right bg-red"><?=$jml_po?></small><?}?>
			 </a></li>
          </ul>
        </li>
		<li class="treeview <?php if($_GET['open']==4){?>active<?}?>">
          <a href="#">
            <i class="fa fa-share"></i> <span>Operations Department</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="treeview"><a href="?m=manager_opr&mm=operations&s=operations&l=production_planning&open=4"><i class="fa fa-circle-o <?php if($_GET['l']=='production_planning'){?>text-red<?}?>"></i> Production Planning
				<?php
				$query_pp=$query("select * from tbl_production_planning where published='1' and approve1='0'");
				$jml_pp=$rows($query_pp);
				?>
				<?php if(!empty($jml_pp)){?><small class="label pull-right bg-red"><?=$jml_pp?></small><?}?>
			</a></li>
          </ul>
        </li>
		<?}?>
		<?php
		if($access15){?>
        <li class="treeview <?php if($_GET['open']==6){?>active<?}?>">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Finance Department</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="?m=manager_finance&mm=finance&s=rpm&l=rpm&open=6"><i class="fa fa-circle-o <?php if($_GET['s']=='rpm'){?>text-red<?}?>"></i> RPM
				<?php
				$query_rpm=$query("select * from tbl_rpm where published='1' and approve1='0'");
				$jml_rpm=$rows($query_rpm);
				?>
				<?php if(!empty($jml_rpm)){?><small class="label pull-right bg-red"><?=$jml_rpm?></small><?}?>
			</a></li>
          </ul>
        </li>
		<?}?>
      </ul>