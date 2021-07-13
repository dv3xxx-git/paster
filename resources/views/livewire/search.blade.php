<div class="container">

    <div class="row">

        <div class="col-md-12">

            

            <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />


            <table class="table table-bordered" style="margin: 10px 0 10px 0;">

                <tr>

                    <th>Name</th>

                    <th>text</th>

                </tr>

                @foreach($pastes as $paste)

                <tr>

                    <td>

                    <a href="{{route('paste.show',$paste->hash)}}">{{ $paste->name }}</a>

                    </td>

                    <td>

                        {{ $paste->text }}

                    </td>

                </tr>

                @endforeach

            </table>

        </div>

    </div>

</div>
