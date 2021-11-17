<a class="float-right pointer" data-toggle="modal" data-target="#modal_{{ $obj->id }}">
    <i class="far fa-trash-alt"></i>
</a>
@include('admin.security.users.profiles._modal',
[
'id'=>$obj->id,
'title'=>'Confirmação de exclusão',
'obj'=>$obj,
'user'=>$user,
'perfis'=>$perfis
])
