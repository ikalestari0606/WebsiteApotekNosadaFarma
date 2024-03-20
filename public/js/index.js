 var firebaseConfig = {
  apiKey: "AIzaSyCEeIQ8WsThHdkL8sFoS61TK6hw4PS6eVs",
  authDomain: "nosada-farma.firebaseapp.com",
  projectId: "nosada-farma",
  storageBucket: "nosada-farma.appspot.com",
  messagingSenderId: "656520765733",
  appId: "1:656520765733:web:fc97dbafc3e2cac7db3acc",
  measurementId: "G-5K14LXHKGT"
  };
  
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
// Initialize variables
const auth = firebase.auth()
const database = firebase.database()




function register() {
  nama = document.getElementById('nama').value;
  username = document.getElementById('username').value;
  password = document.getElementById('password').value;
  email = document.getElementById('email').value;
  telepon = document.getElementById('telepon').value;
  tanggal_lahir = document.getElementById('tanggal_lahir').value;
  jenis_kelamin = document.getElementById('jenis_kelamin').value;
  alamat = document.getElementById('alamat').value;

  //valiate input fields
  if (validate_email(email) == false || validate_password(password) == false) {
    alert('Email or Password is Outta Line!!');
    return;
  }
  if (validate_field(nama) == false || validate_field (username) == false || validate_field (telepon) == false || validate_field (tanggal_lahir) == false || validate_field (jenis_kelamin) == false ||validate_field (alamat) == false) {
    alert('One or More Extra fields is Outta Line!!');
    return;
  }

  // Move on with Auth
  auth.createUserWithEmailAndPassword(email, password)
  .then(function() {
    // Declare user variable
    var user = auth.currentUser;

    // Check if user is not null
    if (user) {
      // user tidak null, maka Anda dapat mengakses properti uid
      var userID = user.uid;
      
      // Add this user to Firebase Database
      var database_ref = database.ref();

      var user_data = {
          nama : nama,
          username : username,
          email : email,
          telepon : telepon,
          tanggal_lahir : tanggal_lahir,
          jenis_kelamin : jenis_kelamin,
          alamat : alamat,
          last_login : Date.now()
      };

       // Push to Firebase Database
       database_ref.child('users/' + userID).set(user_data);

       // DOne
       alert('User Created!!');
    } else {
      // Autentikasi gagal, lakukan sesuatu seperti menampilkan pesan kesalahan
      console.log('Autentikasi gagal!');
    }
  })
  .catch(function(error) {
    // Firebase akan menggunakan ini untuk memberikan pesan kesalahan
    var error_code = error.code;
    var error_message = error.message;

    // Menangani jenis kesalahan tertentu
    switch(error_code) {
      case 'auth/email-already-in-use':
        alert('Email sudah digunakan oleh pengguna lain. Silakan gunakan email lain.');
        break;
      case 'auth/weak-password':
        alert('Kata sandi yang Anda masukkan terlalu lemah. Harap gunakan kata sandi yang lebih kuat.');
        break;
      case 'auth/invalid-email':
        alert('Format email yang Anda masukkan tidak valid. Harap periksa kembali email Anda.');
        break;
      default:
        alert('Terjadi kesalahan saat melakukan autentikasi. Silakan coba lagi nanti.');
    }
  });
}

 // Set up our login function
function login () {
  // Get all our input fields
  email = document.getElementById('email').value
  password = document.getElementById('password').value

  // Validate input fields
  if (validate_email(email) == false || validate_password(password) == false) {
    alert('Email or Password is Outta Line!!')
    return
    // Don't continue running the code
  }

  auth.signInWithEmailAndPassword(email, password)
  .then(function() {
    // Declare user variable
    var user = auth.currentUser

    // Add this user to Firebase Database
    var database_ref = database.ref()

    // Create User data
    var user_data = {
      last_login : Date.now()
    }

    // Push to Firebase Database
    database_ref.child('users/' + user.uid).update(user_data)

    // DOne
    alert('User Logged In!!')

  })
  .catch(function(error) {
    // Firebase will use this to alert of its errors
    var error_code = error.code
    var error_message = error.message

    alert(error_message)
  })
}

  function validate_email(email) {
    return /^[^@]+@\w+(\.\w+)+\w$/.test(email);
  }

  function validate_password(password) {
    return password.length >= 10;
  }

  function validate_field (field){
    if (field == null){
        return false
    }
    if (field.length <= 0){
        return false
    } else {
        return true
    }
  }
