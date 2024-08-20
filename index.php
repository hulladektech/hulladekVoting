<!DOCTYPE html>
<html>
  <head>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"
    />
  </head>
  <body>
    <section class="hero is-primary is-bold">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">Employee of the MONTH Voting</h1>
        </div>
      </div>
    </section>
    <form id="form" class="container m-4 pl-4" method="POST">

     <!-- <div class="field">
        <label class="label">Client Name</label>
        <div class="control">
          <input
            class="input"
            type="text"
            placeholder="Your Client Name"
            name="Client Name"
          />
        </div>
      </div>-->

      <!-- <div class="field">
        <label class="label">Last Name</label>
        <div class="control">
          <input
            class="input"
            type="text"
            placeholder="Your Last Name"
            name="Last Name"
          />
        </div>
      </div> -->

      <!--<div class="field">
        <label class="label">Email</label>
        <div class="control">
          <input
            class="input"
            type="email"
            placeholder="Your Email"
            name="Email"
          />
        </div>
      </div>-->

      <!--<div class="field">
        <label class="label">Password</label>
        <div class="control">
          <input
            class="input"
            type="password"
            placeholder="Your Password"
            name="Password"
          />
        </div>
      </div>-->

      <!--<div class="field">
        <label class="label">Date of Birth</label>
        <div class="control">
          <input
            class="input"
            type="date"
            placeholder="Your Date of Birth"
            name="DOB"
          />
        </div>
      </div>-->

      <div class="field">
        <label class="label">User Name</label>
        <div class="control">
          <label class="radio">
            <input type="radio" name="User Name" value="Person1" /> Person1
          </label>
          <label class="radio">
            <input type="radio" name="User Name" value="Person2" /> Person2
          </label>
        </div>
      </div>

            <div class="field">
        <label class="label">Choose a Month</label>
        <div class="control">
        <select id="dropdown" name="dropdown">
            <option value="Apr">Apr</option>
            <option value="May">May</option>
            <option value="Jun">Jun</option>
            <option value="Jul">Jul</option>
            <option value="Aug">Aug</option>
            <option value="Sep">Sep</option>
            <option value="Oct">Oct</option>
            <option value="Nov">Nov</option>
            <option value="Dec">Dec</option>
            <option value="Jan">Jan</option>
            <option value="Feb">Feb</option>
            <option value="Mar">Mar</option>
        </select>
          </label>
        </div>
      </div>

      <!--<div class="field">
        <label class="label">Agree to Terms</label>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="Agree To Terms" value="yes" /> I agree
            to the terms and conditions
          </label>
        </div>
      </div>-->

      <!--<div class="field">
        <label class="label">Additional Information</label>
        <div class="control">
          <textarea
            class="textarea"
            placeholder="Any additional information"
            name="Notes"
          ></textarea>
        </div>
      </div>-->

      <div class="field is-grouped">
        <div class="control">
          <button class="button is-primary" type="submit" id="submit-button">
            Sumbit
          </button>
        </div>
        <div class="control">
          <button class="button is-danger">Cancel</button>
        </div>
      </div>
    </form>
    <div
      id="message"
      style="
        display: none;
        margin: 20px;
        font-weight: bold;
        color: green;
        padding: 8px;
        background-color: beige;
        border-radius: 4px;
        border-color: aquamarine;
      "
    ></div>

    <script>
      document.getElementById("form").addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent the default form submission
        document.getElementById("message").textContent = "Submitting..";
        document.getElementById("message").style.display = "block";
        document.getElementById("submit-button").disabled = true;

        // Collect the form data
        var formData = new FormData(this);
        var keyValuePairs = [];
        for (var pair of formData.entries()) {
          keyValuePairs.push(pair[0] + "=" + pair[1]);
        }

        var formDataString = keyValuePairs.join("&");

        // Send a POST request to your Google Apps Script
        fetch(
          "https://script.google.com/macros/s/AKfycbwXwriHrIq9KYMyKa8ch8tagy3iJco2bhpGZmUFELtB2CCE_4uitRB3U4oGLb7T7w3Q/exec",
          {
            redirect: "follow",
            method: "POST",
            body: formDataString,
            headers: {
              "Content-Type": "text/plain;charset=utf-8",
            },
          }
        )
          .then(function (response) {
            // Check if the request was successful
            if (response) {
              return response; // Assuming your script returns JSON response
            } else {
              throw new Error("Failed to submit the form.");
            }
          })
          .then(function (data) {
            // Display a success message
            document.getElementById("message").textContent =
              "Data submitted successfully!";
            document.getElementById("message").style.display = "block";
            document.getElementById("message").style.backgroundColor = "green";
            document.getElementById("message").style.color = "beige";
            document.getElementById("submit-button").disabled = false;
            document.getElementById("form").reset();

            setTimeout(function () {
              document.getElementById("message").textContent = "";
              document.getElementById("message").style.display = "none";
            }, 2600);
          })
          .catch(function (error) {
            // Handle errors, you can display an error message here
            console.error(error);
            document.getElementById("message").textContent =
              "An error occurred while submitting the form.";
            document.getElementById("message").style.display = "block";
          });
      });
    </script>
  </body>
</html>
