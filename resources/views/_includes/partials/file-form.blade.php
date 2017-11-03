<div class="file has-name is-boxed">
  
  <label class="file-label">
    
    {!! Form::file('image', ['class' => 'file-input', 'id' => 'file', 'required',] )!!}
    <span class="file-cta">
      <span class="file-icon">
        <i class="fa fa-upload"></i>
      </span>
      <span class="file-label"  >
        Choose a file…
      </span>
    </span>
    <span class="file-name center" id="filename">
      
    </span>
    <br>
    
    {!! Form::submit($submit, ['class' => 'button is-primary is-fullwidth'] )!!}
  </label>

</div>

<div class="control">
	
</div>
<script type="text/javascript">
var file = document.getElementById("file");
file.onchange = function(){
    if(file.files.length > 0)
    {
      document.getElementById('filename').innerHTML = file.files[0].name;
    }
};
  
</script>