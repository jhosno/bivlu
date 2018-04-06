@foreach($data as $value)
                <div class="col-md-4">
                    <div class="bs-component well" style="text-align: left;">
                    <h4 style="cursor:pointer;" onclick="mosrar('{{$value['titulo']}}','{{$value['resumen']}}')">{{$value['titulo']}}</h4>
                    <section class="tags">
                    <b>Autores:</b> 
        @foreach($value['authors'] as $a)
                    <span class="label label-primary">{{ $a['nombre'] }}</span>
        @endforeach
                    </section>
                    <section class="tags">
                    <b>Etiquetas:</b> 
        @foreach($value['tags'] as $t)
                    <span class="label label-success">{{ $t['palabras'] }}</span>
        @endforeach
                    </section>
                    <section class="tags" style="width:100%;">
                    <b>Disponibles:</b> <span class="badge" id="badge_{{$value['id']}}">{{ $value['disponibles'] ? $value['disponibles'] : 'No disp.' }}</span>
                    </section>
                    @if($value['disponibles'] > 2 && $value['url']==null)
                    <a data-id="{{$value['id']}}" data-titulo="" class="loan-trigger btn btn-raised btn-info">Solicitar +</a>
                    @elseif($value['url']!=null)
                    <a href="{{ url('tesis/'.$value['id']) }}" data-titulo="" class="read btn btn-raised btn-info">Visualizar</a>
                    @endif

                    </div>
                </div>
@endforeach
<script type="text/javascript">
    function mosrar(titulo,resumen){
              $('#all-modal').html('<div class="modal-header">'+titulo+'- Sinopsis</div>\
                <div class="modal-body">\
                    <p>'+resumen+'</p>\
                </div>\
                <a href="" data-dismiss="modal" class="btn btn-primary">Cerrar</a>').modal('toggle');
          } 
</script>