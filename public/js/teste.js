db.system.js.save({
  _id:"deposit",
  value:function(idReceived,ammount){
    db.usuarios.update({"id": idReceived}, {$inc: {Balance: + ammount} } )
    
  }
})

{
  "id"

}


db.system.js.save({
  _id:"Transfender",
  value:function(idSender,idReceived,ammount){
   var statusTransaction;
   if (db.accounts.find({id:idReceived}).limit(1).size() == 0 || db.accounts.find({id:idSender}).limit(1).size() == 0 )
   {
     statusTransaction = 1
     
   }
   else
   {
    statusTransaction = 0
     
   }
   if(statusTransaction == 0)
   {
    if(db.accounts.distinct("balance",{id:idSender}) >= ammount)
    {
      statusTransaction = 0;
      db.transactions.insert({"idSender":idSender,"idReceived":idReceived,"date":Date()});
      db.accounts.update({"id": idReceived}, {$inc: {balance: + ammount} } );
      db.accounts.update({"id": idSender}, {$inc: {balance: - ammount} } );
    
    }
    else
    {
      statusTransaction = 2; 
    } 
   }
   return statusTransaction;
  }
})
db.loadServerScripts() // Carga las funciones en mongodb

Transfender(idSender,idReceived,ammount); // llamada a la funcion 

