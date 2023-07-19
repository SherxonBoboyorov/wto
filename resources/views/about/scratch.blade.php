<div class="mb-1">
    <label class="form-label" for="basic-default-email1">Email</label>
    <input
      type="email"
      id="basic-default-email1"
      class="form-control"
      placeholder="john.doe@email.com"
      aria-label="john.doe@email.com"
      required
    />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please enter a valid email</div>
  </div>
  <div class="mb-1">
    <label class="form-label" for="basic-default-password1">Password</label>
    <input
      type="password"
      id="basic-default-password1"
      class="form-control"
      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
      required
    />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please enter your password.</div>
  </div>
  <div class="mb-1">
    <label class="form-label" for="bsDob">DOB</label>
    <input type="text" class="form-control picker" name="dob" id="bsDob" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please enter your date of birth.</div>
  </div>
  <div class="mb-1">
    <label class="form-label" for="select-country1">Country</label>
    <select class="form-select" id="select-country1" required>
      <option value="">Select Country</option>
      <option value="usa">USA</option>
      <option value="uk">UK</option>
      <option value="france">France</option>
      <option value="australia">Australia</option>
      <option value="spain">Spain</option>
    </select>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please select your country</div>
  </div>
  <div class="mb-1">
    <label for="customFile1" class="form-label">Profile pic</label>
    <input class="form-control" type="file" id="customFile1" required />
  </div>
  <div class="mb-1">
    <label class="form-label" class="d-block">Gender</label>
    <div class="form-check my-50">
      <input
        type="radio"
        id="validationRadio3"
        name="validationRadioBootstrap"
        class="form-check-input"
        required
      />
      <label class="form-check-label" for="validationRadio3">Male</label>
    </div>
    <div class="form-check">
      <input
        type="radio"
        id="validationRadio4"
        name="validationRadioBootstrap"
        class="form-check-input"
        required
      />
      <label class="form-check-label" for="validationRadio4">Female</label>
    </div>
  </div>
  <div class="mb-1">
    <label for="validationCustomUsername" class="form-label">Username</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input
        type="text"
        class="form-control"
        id="validationCustomUsername"
        aria-describedby="inputGroupPrepend"
        required
      />
      <div class="invalid-feedback">Please choose a username.</div>
    </div>
  </div>

  <div class="mb-1">
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="validationCheckBootstrap" required />
      <label class="form-check-label" for="validationCheckBootstrap">Agree to our terms and conditions</label>
      <div class="invalid-feedback">You must agree before submitting.</div>
    </div>
  </div>