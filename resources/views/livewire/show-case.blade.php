<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="case-tab" role="tablist">
            <li class="nav-item">
                <a wire:click="$set('step',1)" class="nav-link {!!$step== 1 ? 'active' : ''!!}" id="case-details-tab" data-toggle="pill" href="#case-details"
                    role="tab" aria-controls="case-details" aria-selected="{{$step == 1}}">Details</a>
            </li>
            <li class="nav-item">
                <a wire:click="$set('step',2)" class="nav-link {!! $step== 2 ? 'active' : '' !!}" id="case-findings-tab" data-toggle="pill" href="#case-findings" role="tab"
                    aria-controls="case-findings" aria-selected="{{$step == 2}}">Findings</a>
            </li>
            <li class="nav-item">
                <a wire:click="$set('step',3)" class="nav-link {!! $step== 3 ? 'active' : '' !!}" id="case-contributors-tab" data-toggle="pill" href="#case-contributors"
                    role="tab" aria-controls="case-contributors" aria-selected="{{$step == 3}}">Contributors</a>
            </li>
            <li class="nav-item">
                <a wire:click="$set('step',4)" class="nav-link {!! $step== 4 ? 'active' : '' !!}" id="case-collaborators-tab" data-toggle="pill" href="#case-collaborators"
                    role="tab" aria-controls="case-collaborators" aria-selected="{{$step == 4}}">Collaborators</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="case-tabContent">
            <div class="tab-pane fade show active" id="case-details" role="tabpanel"
                aria-labelledby="case-details-tab">
                @include('admin.case_models.show_fields')
            </div>
            <div class="tab-pane fade" id="case-findings" role="tabpanel" aria-labelledby="case-findings-tab">
                <button class="btn btn-primary" wire:click="$dispatchTo('modal','openModal',path: 'findings.fields')">Open Modal</button>
                @include('admin.findings.header')
                @include('admin.findings.table', [
                    'findings' => $caseModel->findings()->paginate(10),
                ])
            </div>
            <div class="tab-pane fade" id="case-contributors" role="tabpanel"
                aria-labelledby="case-contributors-tab">
                @include('admin.users.header')
                {{-- @include('admin.users.table',['users' => collect()->paginate(10)]) --}}
            </div>
            <div class="tab-pane fade" id="case-collaborators" role="tabpanel"
                aria-labelledby="case-collaborators-tab">
                Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac,
                ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi
                euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum
                placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc
                et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex
                sit amet facilisis.
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
