<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->

    <table class="table">
        <thead>
           <tr>
              <th>NO.</th>
              <th>user name</th>
              <th>book_id</th>
              <th>book name</th>
              <th>rent_date</th>
              <th>return_date</th>
              <th>actual_return_date</th>
           </tr>
        </thead>
     
        <tbody>
           @foreach ($rentlog as $rent)
           <tr class="{{ $rent->actual_return_date == NULL ? '' : ($rent->renturn_date < $rent->actual_return_date ? 'text-bg-danger' : 'text-bg-success')   }}">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $rent->user->username }}</td>
              <td>{{ $rent->book->book_code}}</td>
              <td>{{ $rent->book->title }}</td>
              <td>{{ $rent->rent_date }}</td>
              <td>{{ $rent->renturn_date }}</td>
              <td>{{ $rent->actual_return_date }}</td>
           </tr>
           @endforeach
           
        </tbody>
     
     </table>
</div>