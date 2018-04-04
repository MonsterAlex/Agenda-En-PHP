const mongoose = require('mongoose')

mongoose.connect('mongodb://localhost/agendaNode')

const Schema = mongoose.Schema

let UserSchema = new Schema({
  userId: { type: String, required: true, unique: true},
  nombres: { type: String, required: true},
  contrasena: { type: String, required: true},
  nacimiento: { type: String, required: true}
})

let UserModel = mongoose.model('Usuario', UserSchema)

var newUser = new UserModel({userId:"Monster_Alex_53@hotmail.com", nombres:"Alejandro Reyes", contrasena:"123456", nacimiento:"1994-08-21"});

newUser.save((error)=>{
  if(error){
    console.log(error);
  }else{
    console.log("Usuario creado");
  }
})
