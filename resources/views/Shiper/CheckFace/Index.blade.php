@extends("Shiper.Layouts.Master")
@section('Title', 'Nhận diện gương mặt')
@section('Content')

<script defer src="{{ asset('face-api/face-api.min.js')}}"></script>
<script defer src="{{ asset('face-api/script.js')}}"></script>
<style type="text/css">
  #ok{
    position: absolute;
    width: 338px;
    height: 240px;
    opacity: 0.3;
    background: linear-gradient(#03A9F4,#03A9F4), 
    linear-gradient(90deg, #ffffff33 1px,transparent 0,transparent 19px),
    linear-gradient(#ffffff33 1px,transparent 0,transparent 19px),
    linear-gradient(transparent, #2196f387);
    background-size:100% 1.5%, 10% 100%,100% 10%, 100% 100%;
    background-repeat: no-repeat,repeat,repeat,no-repeat;
    background-position: 0 0,0 0, 0 0, 0 0;
    clip-path: polygon(0% 0%, 100% 0%, 100% 1.5%, 0% 1.5%);
    animation: move 2s infinite linear;
  }
  @keyframes move{
    to{
      background-position: 0 100%,0 0, 0 0, 0 0;
      clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%);
    }

  }
  .box {
    --b:5px;   /* thickness of the border */
    --c:red;   /* color of the border */
    --w:20px;  /* width of border */


    border:var(--b) solid transparent; /* space for the border */
    --g:#0000 90deg,var(--c) 0;
    background:
    conic-gradient(from 90deg  at top    var(--b) left  var(--b),var(--g)) 0    0,
    conic-gradient(from 180deg at top    var(--b) right var(--b),var(--g)) 100% 0,
    conic-gradient(from 0deg   at bottom var(--b) left  var(--b),var(--g)) 0    100%,
    conic-gradient(from -90deg at bottom var(--b) right var(--b),var(--g)) 100% 100%;
    background-size:var(--w) var(--w);
    background-origin:border-box;
    background-repeat:no-repeat;


  }
</style>
@include('Shiper.Layouts.Header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container bg-white" style="padding-top: 60px;">
  <div class="shadow-sm p-2 box" style="width: 360px;margin: auto;">
    <p class="fz95 tx font-weight-bold text-center">Nhận diện gương mặt</p>
    <div id="ok"></div>
    <video id="videoInput" width="338" height="240" muted controls></video>
     <p id="name-auth" class="d-none">{{Auth::user()->name}}</p>
     <p id="status" class="fz95 tx mt-2 text-center">Nhận diện gương mặt</p>
   </div>
 </div>



 <script type="text/javascript">
  var countError = 0;
  const video = document.getElementById('videoInput')

  function start() {
    // document.body.append('Models Loaded')
     $('#status').text('Đang tải dữ liệu')

    navigator.getUserMedia(
      { video:{} },
      stream => video.srcObject = stream,
      err => console.error(err)
      )

  //video.src = '../videos/speech.mp4'
  console.log('video added')
  recognizeFaces()

}

async function recognizeFaces() {

  const labeledDescriptors = await loadLabeledImages()
  console.log(labeledDescriptors)
  const faceMatcher = new faceapi.FaceMatcher(labeledDescriptors, 0.7)

  video.play();
  video.addEventListener('play', async () => {
    console.log('Playing')
    const canvas = faceapi.createCanvasFromMedia(video)
    // document.body.append(canvas)

    const displaySize = { width: video.width, height: video.height }
    faceapi.matchDimensions(canvas, displaySize)



    setInterval(async () => {
      const detections = await faceapi.detectAllFaces(video).withFaceLandmarks().withFaceDescriptors()

      const resizedDetections = faceapi.resizeResults(detections, displaySize)

      canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)

      const results = resizedDetections.map((d) => {
        return faceMatcher.findBestMatch(d.descriptor)
      })
      results.forEach( (result, i) => {
        const box = resizedDetections[i].detection.box
        const drawBox = new faceapi.draw.DrawBox(box, { label: result.toString() })
        drawBox.draw(canvas)
      })
      
      if(results.length >0 && results[0]._label == $('#name-auth').text()){
        $('#status').text('Nhận diện Success')
        console.log(results[0]._label);
        window.location.href = "{{url('kenh-giao-hang/xac-nhan-thanh-cong')}}";
      }else{
        countError++;
        $('#status').text('Nhận diện thất bại lần '+countError)
      }
      if(countError == 3){
        window.location.href = "{{url('kenh-giao-hang/dang-xuat')}}";
      }
      
    }, 5000)



  })
}


function loadLabeledImages() {
  const labels = [];
  @foreach($getShiper as $item)
  labels.push("{{$item->name}}")
  @endforeach
  console.log(labels);
  return Promise.all(
    labels.map(async (label)=>{
      const descriptions = []
      for(let i=1; i<=2; i++) {
        const img = await faceapi.fetchImage(`../storage/face-data/${label}/${i}.jpg`)
        const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
        console.log(label + i + JSON.stringify(detections))
        descriptions.push(detections.descriptor)

      }
      // document.body.append(label+' Faces Loaded | ')
       $('#status').text('Tải dữ liệu hoàn tất')
      return new faceapi.LabeledFaceDescriptors(label, descriptions)
    })
    )
}
</script>
@endsection
