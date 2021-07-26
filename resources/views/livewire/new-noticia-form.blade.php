<form wire:submit.prevent="submit">
    <div class="form-group">
        <label for="exampleInputTitulo">Titulo</label>
        <input type="text" class="form-control" id="exampleInputTitulo" placeholder="Enter titulo" wire:model="titulo">
        @error('titulo') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  
    <div class="form-group">
        <label for="exampleInputEmail">Descripcion</label>
        <input type="text" class="form-control" id="exampleInputDescripcion" placeholder="Enter descripcion" wire:model="descripcion">
        @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  <?php /*
    <div class="form-group">
        <label for="exampleInputbody">Body</label>
        <textarea class="form-control" id="exampleInputbody" placeholder="Enter Body" wire:model="body"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  */ ?>
    <button type="submit" class="btn btn-primary">Guardar Noticia</button>
</form>