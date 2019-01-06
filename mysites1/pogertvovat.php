<?php require 'block/header.php';?>
<form id="paymentFormSample" autocomplete="off" class="containers">
    <input type="text" data-cp="cardNumber" placeholder="Номер карты*" maxlength="20" onkeyup="var yratext=/['0-9', '<', '>', ';', '<',]/; if(yratext.test(this.value)) alert('Введены запрещенные символы')">
    <input type="text" data-cp="expDateMonth" placeholder="Месяц срока действия*" maxlength="2" onkeyup="var yratext=/['A-z','А-я','<','>']/; if(yratext.test(this.value)) alert('Введены запрещенные символы')">
    <input type="text" data-cp="expDateYear" placeholder="Год срока действия*" maxlength="2" onkeyup="var yratext=/['A-z','А-я','<','>']/; if(yratext.test(this.value)) alert('Введены запрещенные символы')">
    <input type="text" data-cp="cvv" placeholder="CVV*" maxlength="3" onkeyup="var yratext=/['A-z','А-я','<','>']/; if(yratext.test(this.value)) alert('Введены запрещенные символы')">
    <input type="text" data-cp="name" placeholder="Имя и фамилия*">
    <button type="submit">Оплатить</button>
</form>

<script type="text/javascript">
  this.createCryptogram = function () {
      var result = checkout.createCryptogramPacket();

      if (result.success) {
          // сформирована криптограмма
          alert(result.packet);
      }
      else {
          // найдены ошибки в введённых данных, объект `result.messages` формата:
          // { name: "В имени держателя карты слишком много символов", cardNumber: "Неправильный номер карты" }
          // где `name`, `cardNumber` соответствуют значениям атрибутов `<input ... data-cp="cardNumber">`
         for (var msgName in result.messages) {
             alert(result.messages[msgName]);
         }
      }
  };

  $(function () {
      /* Создание checkout */
      checkout = new cp.Checkout(
      // public id из личного кабинета
      "pk_093883314990dbff6df5b45ca0a1f",
      // тег, содержащий поля данных карты
      document.getElementById("paymentFormSample"));
  });
</script>
<?php require 'block/footer.php';?>
