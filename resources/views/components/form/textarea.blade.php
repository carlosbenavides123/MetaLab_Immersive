<label>
    {{Form::label($name,null,['class'=>'control-label','style'=>'font-size:20px;'])}}
    {{Form::textarea($name,$value,array_merge(['class'=>'form-control'],$attributes))}}
</label>