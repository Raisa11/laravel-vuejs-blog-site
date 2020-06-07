<h1>hello {{$fullname}}</h1>
<p style="color:red">your email {{$email}}</p>
<p style="color:blue"> your phone {{$phone}}</p>
<h3>please click this following link to confirm your registration</h3>
{{url('/public-register/confirmation/'.$token)}}
