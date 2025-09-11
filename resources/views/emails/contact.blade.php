<h2>New contact message</h2>
<p><strong>Name:</strong> {{ $data['first_name'] }} {{ $data['last_name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
@if (!empty($data['phone']))
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
@endif
@if (!empty($data['subject']))
    <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
@endif
<hr>
<p>{{ nl2br(e($data['message'])) }}</p>
