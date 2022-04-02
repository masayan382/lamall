const testUser = (name) => {
    console.log("test");
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let visitor = name;
    if (visitor === "user") {
        email.value = "user@user.com";
    }
    if (visitor === "admin") {
        email.value = "admin@admin.com";
    }
    if (visitor === "owner") {
        email.value = "owner@owner.com";
    }
    password.value = "password123";
};
