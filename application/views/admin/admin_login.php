<div class="container" id="container_separator"></div>

<div class="container">
	<div class="span7">
		<div class="span5">
			<?php
				$message = $this->session->flashdata('error');
				if (isset($message))
				{
					if ($message == 'error_message')
					{
						echo '<div class="alert alert-error">';  
						echo '<a class="close" data-dismiss="alert">&times;</a>  ';
						echo 'Login error: '."Input Password or User Name";
						echo '</div> ';
					}
					else if ($message == 'error_login_code')
					{
						echo '<div class="alert alert-error">';  
						echo '<a class="close" data-dismiss="alert">&times;</a>  ';
						echo 'Login error: '."Invalid Password or User Name";
						echo '</div> ';
					}	
				}
			?>
		</div>
	</div>
</div>		

<div class="container">
	<div class="span5" align="center">
		<?= form_open('admin/login', array('id' => 'index', 'class'=>'form-horizontal')); ?>
			 <div class="control-group">
				<label class="control-label" for="inputEmail">User Name</label>
				<div class="controls">
					<input type="text" placeholder="User Name" name="username">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
					<input type="password" name="password"  placeholder="Password">
				</div>
			</div>
			 <div class="form-actions">
				 <div class="span1" align="center">
					<button type="submit" name="login" class="btn btn-inverse">Sign in</button>			
				</div>				
			</div>
		<?= form_close();?>	
	</div>
</div>