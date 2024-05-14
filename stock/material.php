<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Stock</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Stock</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addMaterialModalBtn" data-target="#addMaterialModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Material </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageMaterialTable">
					<thead>
						<tr>
							<th style="width:10%;">Material ID</th>							
							<th>Material Name</th>
							<th>Unit</th>							
							<th>Unit Price</th>
							<th>Stock Quantity</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add Material -->
<div class="modal fade" id="addMaterialModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitMaterialForm" action="php_action/createMaterial.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Material</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-material-messages"></div>
	     	           	       
			<div class="form-group">
	        	<label for="materialID" class="col-sm-3 control-label">Material ID: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="materialID" placeholder="Material ID" name="materialID" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="materialName" class="col-sm-3 control-label">Material Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="materialName" placeholder="Material Name" name="materialName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    
			
			<div class="form-group">
	        	<label for="unit" class="col-sm-3 control-label">Unit: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="unit" placeholder="Unit" name="unit" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	
	        
			<div class="form-group">
	        	<label for="unit" class="col-sm-3 control-label">Unit Price: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="unitPrice" placeholder="Unit Price" name="unitPrice" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	

			<div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label">Stock Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity" placeholder="Stock Quantity" name="quantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createMaterialBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editMaterialModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Material</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>
	      	<div class="div-result">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <!-- <li role="presentation" class="active"><a href="#photo" aria-controls="home" role="tab" data-toggle="tab">Photo</a></li> -->
				    <li role="presentation"><a href="#materialInfo" aria-controls="profile" role="tab" data-toggle="tab">Material Info</a></li>    
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">     	           	       
				    	
				    <div role="tabpanel" class="tab-pane" id="materialInfo">
				    	<form class="form-horizontal" id="editMaterialForm" action="php_action/editMaterial.php" method="POST">				    
				    	<br />

				    	<div id="edit-material-messages"></div>
					<div class="form-group">
			        	<label for="editMaterialID" class="col-sm-3 control-label">Material ID: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editMaterialID" placeholder="Material ID" name="editMaterialID" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	
				    	<div class="form-group">
			        	<label for="editMaterialName" class="col-sm-3 control-label">Material Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editMaterialName" placeholder="Material Name" name="editMaterialName" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	    

			        <div class="form-group">
			        	<label for="editUnit" class="col-sm-3 control-label">Unit: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editUnit" placeholder="Unit" name="editUnit" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	     	        
					
					<div class="form-group">
			        	<label for="editUnitPrice" class="col-sm-3 control-label">Unit Price: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editUnitPrice" placeholder="Unit Price" name="editUnitPrice" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	

					<div class="form-group">
			        	<label for="editQuantity" class="col-sm-3 control-label">Stock Quantity: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editQuantity" placeholder="Quantity" name="editQuantity" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	
			        
					<div class="modal-footer editMaterialFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				        
				        <button type="submit" class="btn btn-success" id="editMaterialBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->				     	
				    </div>    
				    <!-- /Material info -->
				  </div>

				</div>
	      	
	      </div> <!-- /modal-body -->
	      	      
     	
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMaterialModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Material</h4>
      </div>
      <div class="modal-body">

      	<div class="removeMaterialMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeMaterialFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeMaterialBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<script src="custom/js/material.js"></script>

<?php require_once 'includes/footer.php'; ?>