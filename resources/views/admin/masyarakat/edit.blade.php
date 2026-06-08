<form
action="{{ route('admin.masyarakat.update',$masyarakat->id) }}"
method="POST">

@csrf
@method('PUT')