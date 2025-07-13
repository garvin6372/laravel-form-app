<form action="/form" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="full_name" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="phone" placeholder="Phone Number" required><br>
    <input type="text" name="ni_number" placeholder="NI Number" required><br>

    <select name="reason" required>
        <option value="">Select Reason</option>
        <option value="tax">Tax</option>
        <option value="self assessment">Self Assessment</option>
        <option value="payee">Payee</option>
    </select><br>

    BRP Front Image: <input type="file" name="brp_front"><br>
    BRP Back Image: <input type="file" name="brp_back"><br>
    Bank Statement (PDF): <input type="file" name="bank_statement"><br>
    Receipts (PDF): <input type="file" name="receipts"><br>

    <button type="submit">Submit</button>
</form>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
