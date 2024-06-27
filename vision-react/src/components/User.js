export default class User{
constructor(email,password){
this._email=email;
this._password=password;
}

toJSON() {
    return {
    email : this._email,
    password: this._password,
    }
    }
}