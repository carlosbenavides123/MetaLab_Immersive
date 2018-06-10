<div class="form-group">
    {{Form::label($name,null, ['class'=>'control-label','style'=>'font-size:20px;'])}}
    {{Form::text($name,$value,array_merge(['class' => 'form-control'], $attributes ))}}
</div>