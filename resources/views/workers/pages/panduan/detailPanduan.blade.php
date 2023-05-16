@extends('workers.layouts.master')

@section('content')
<div class="row col-md-12">
    <div class="col-lg-12">
        <div class="card" style="box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body col-lg-12 px-5 py-5">
                <div class="row d-flex justify-content-between">
                    <div class="row col-lg-6">
                        <div class="col-12 align-self-center">
                            <h4 class="page-title font-weight-medium mb-1" style="color: #0F98D6;">Panduan Membersihkan Ruang Kelas</h4>
                            <!-- PATH -->
                            <div class="d-flex align-items-center" >
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb m-0 p-0" style="background-color: transparent;">
                                        <li class="breadcrumb-item"><a style="color: #5F76E8;" href="{{ route('workersPanduan') }}">Panduan</a></li>
                                        <li class="breadcrumb-item text-muted active" aria-current="page">Membersihkan Ruang Kelas</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="font-weight-medium mt-3" style="color: #2A3547;">Hal yang harus diperhatikan:</h6>
                <h6>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis voluptatum, repudiandae architecto repellendus, laboriosam quidem animi eveniet excepturi cupiditate reprehenderit dicta debitis minima, nemo nam. Fugit at excepturi asperiores odit dolor animi repudiandae quae voluptatum aliquid vitae? Maiores in quod illo magnam molestias id, facilis sed, esse ipsa numquam non? Voluptatibus aperiam quod, harum odit ad cumque accusamus quia, cum maiores quos omnis ratione expedita eum! Illo aliquam asperiores praesentium, hic expedita quae cupiditate! Ex tenetur distinctio tempora laborum esse ducimus dolores, nostrum, praesentium earum labore asperiores vero. Numquam aspernatur quia quos sapiente ab iusto alias in doloremque non fugiat.</h6>
                <ol>
                    <h6>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius ullam, necessitatibus veniam quas quia, nemo nobis rerum unde cum aliquid porro illo dignissimos architecto, adipisci fuga eveniet. Deleniti numquam amet quae molestiae rerum corrupti nesciunt a non, dignissimos aut ullam dolorum itaque officiis exercitationem illo expedita perspiciatis autem quos. Quo neque iusto iste magni eligendi in recusandae voluptatem quasi quidem nisi dolor error a exercitationem, beatae deserunt ipsam quod, obcaecati, velit nemo temporibus aperiam. Sit, non? Optio, eaque! Labore, dolores?</li>
                        <br>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae provident id ipsam architecto culpa quia necessitatibus, incidunt aspernatur molestiae mollitia hic sed possimus ex omnis harum ad dicta exercitationem magnam similique unde consequuntur nemo in. Aperiam est laboriosam vel laudantium nemo quo maxime, nobis, veniam, iure atque maiores aut.</li>
                        <br>
                        <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem debitis aliquam quo sit, ipsum corrupti excepturi tempore facere incidunt quod vitae nostrum quae odit ex alias, similique error aperiam, quia sunt. Facere, molestiae accusantium unde odio odit quas dolorem porro totam ullam laborum cumque quo commodi explicabo aliquam quod debitis, eius inventore? Rerum expedita mollitia eligendi maiores temporibus, architecto quod?</li>
                    </h6>
                </ol>
            </div>
            <div style="float: inline-end;">
                <img style="float: right; width: 250px;" src="../../assets/images/sapu-form.png" alt="">
            </div>
        </div>
    </div>
 </div>
 @endsection