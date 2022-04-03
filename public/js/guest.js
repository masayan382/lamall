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

(() => {
    const target = document.getElementById("login_card");
    console.log(target);
    const url = location.href;
    console.log(url);
    if (url.indexOf("admin") >= 0) {
        target.classList.add("bg-red-100");
    }
    if (url.indexOf("owner") >= 0) {
        target.classList.add("bg-blue-100");
    }
})();
