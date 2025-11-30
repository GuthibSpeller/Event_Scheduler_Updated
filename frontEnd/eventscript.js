    const modal = document.getElementById('modal');
    const modalDate = document.getElementById('modal-date');
    const modalList = modal.querySelector('ul');
    const closeBtn = document.querySelector('.modal-close');
    const days = document.querySelectorAll('.day');

    // Helper to format datetime to readable string
    function formatDateTime(datetimeStr) {
        const options = { 
            year: 'numeric', month: 'short', day: 'numeric', 
            hour: 'numeric', minute: '2-digit', hour12: true 
        };
        return new Date(datetimeStr).toLocaleString('en-US', options);
    }

    // Show modal on day click
    days.forEach(day => {
        day.addEventListener('click', () => {
            const date = day.getAttribute('data-date');
            modalDate.textContent = date;

            // Clear previous content
            modalList.innerHTML = '';

            // Filter events for this date
            const eventsOnDate = events.filter(ev => ev.event_start.substr(0,10) === date);

            if(eventsOnDate.length === 0) {
                const li = document.createElement('li');
                li.textContent = 'No events on this day.';
                li.style.padding = '5px 0';
                modalList.appendChild(li);
            } else {
                eventsOnDate.forEach(ev => {
                    const li = document.createElement('li');
                    li.style.padding = '10px 0';

                    // Nested UL for bullets
                    const nestedUl = document.createElement('ul');
                    nestedUl.style.paddingLeft = '30px'; // padding from left

                    // --- Title ---
                    const titleLi = document.createElement('li');
                    titleLi.innerHTML = `<span style="color:violet; font-weight:600;">Title:</span> ${ev.event_title}`;
                    titleLi.style.borderBottom = '1px solid rgba(255,255,255,0.3)'; // line below
                    titleLi.style.paddingBottom = '5px';
                    titleLi.style.marginBottom = '5px';
                    nestedUl.appendChild(titleLi);

                    // --- Date/Time ---
                    const dateLi = document.createElement('li');
                    dateLi.innerHTML = `<span style="color:violet; font-weight:600;">Date:</span> ${formatDateTime(ev.event_start)} - ${formatDateTime(ev.event_end)}`;
                    dateLi.style.borderBottom = '1px solid rgba(255,255,255,0.3)';
                    dateLi.style.paddingBottom = '5px';
                    dateLi.style.marginBottom = '5px';
                    nestedUl.appendChild(dateLi);

                    // --- Description ---
                    if(ev.event_description) {
                        const descLi = document.createElement('li');
                        descLi.innerHTML = `<span style="color:violet; font-weight:600;">Description:</span> ${ev.event_description}`;
                        descLi.style.borderBottom = '1px solid rgba(255,255,255,0.3)';
                        descLi.style.paddingBottom = '5px';
                        descLi.style.marginBottom = '5px';
                        nestedUl.appendChild(descLi);
                    }

                    // --- Author ---
                    if(ev.event_author) {
                        const authorLi = document.createElement('li');
                        authorLi.innerHTML = `<span style="color:violet; font-weight:600;">Author:</span> ${ev.event_author}`;
                        authorLi.style.borderBottom = '1px solid rgba(255,255,255,0.3)';
                        authorLi.style.paddingBottom = '5px';
                        authorLi.style.marginBottom = '5px';
                        nestedUl.appendChild(authorLi);
                    }

                    // --- Status ---
                    if(ev.event_status) {
                        const statusLi = document.createElement('li');
                        statusLi.innerHTML = `<span style="color:violet; font-weight:600;">Status:</span> ${ev.event_status}`;
                        statusLi.style.borderBottom = '1px solid rgba(255,255,255,0.3)';
                        statusLi.style.paddingBottom = '5px';
                        statusLi.style.marginBottom = '5px';
                        nestedUl.appendChild(statusLi);
                    }

                    li.appendChild(nestedUl);
                    modalList.appendChild(li);
                });
            }

            modal.style.display = 'flex';
        });
    });


    // Close modal on close button
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Close modal if clicked outside content
    modal.addEventListener('click', e => {
        if(e.target === modal) modal.style.display = 'none';
    });

    //for password confirmation
    function validatePassword() {
        let password = document.getElementById("admin_password").value;
        let confirm = document.getElementById("admin_confirm").value;
        const error = document.getElementById('error');


        if (password !== confirm) {
            error.style.display = "block";  // show error
            return false; // prevent form submission
        }

        error.style.display = "none"; // hide error if valid
        return true;
    }

    //new password logic 
    function validateNewPassword() {
        const password = document.getElementById("new_password").value;
        const confirm = document.getElementById("confirm_new_password").value;

        if (password !== confirm) {
            showNewPassError();
            return false; // prevent form submission
        }

        hideNewPassErrorMessage();
        return true;
    }

    function showNewPassError() {
        const error = document.getElementById('error');
        if (!error) return;

        error.style.display = 'flex';   
        error.classList.remove('hide');
        error.classList.add('show');

        // setups click outside to hide
        hideNewPassErrorOnClickOutside();
    }

    function validateEvent() {
        const start = document.getElementById('event_start').value;
        const end = document.getElementById('event_end').value;
        const error = document.getElementById('error');

        if (new Date(end) < new Date(start)) {
            error.style.display = "block";  // show error
            return false; // prevent form submission
        }

        error.style.display = "none"; // hide error if valid
        return true;
    }

    function openAddModal() {
        document.getElementById('eventAddModal').style.display = 'flex';
    }

    function closeModal() {
        const add = document.getElementById("eventAddModal");
        const edit = document.getElementById("eventEditModal");
        //Search modal
        if (add) add.style.display = "none";
        if (edit) edit.style.display = "none";
    }

    //Search bar functions
    //Closes search modal upon clicking
    function closeSearchModal() {
        document.getElementById('searchModal').style.display = 'none';
    }

    //Close search modal if clicked outside
    searchModal.addEventListener('click', (e) => {
        if (e.target === searchModal) {
            searchModal.style.display = 'none';
        }
    });

    //Hide-on-scroll footer JS
    let lastScroll = 0;
    const footer = document.querySelector('.footer');

    window.addEventListener('scroll', () => {
        const currentScroll = window.scrollY;
        if (currentScroll > lastScroll) {
            // scrolling down → hide footer
            footer.style.transform = 'translateY(100%)';
        } else {
            // scrolling up → show footer
            footer.style.transform = 'translateY(0)';
        }
        lastScroll = currentScroll;
    });



    // Fades and slides out the pop-up message for user dashboard
    function hideErrorMessage() {
        const errorMsg = document.querySelector('.error-message-container');
        if (!errorMsg) return;

        errorMsg.classList.add('error-hide');

        setTimeout(() => errorMsg.remove(), 450); // hides the message pop-up
    }

    // Hides error message when clicking outside
    function hideErrorOnClickOutside(selector) {
        const errorMsg = document.querySelector(selector);
        if (!errorMsg) return;

        document.addEventListener('click', (e) => {
            if (!errorMsg.contains(e.target)) {
                hideErrorMessage();
            }
        });
    }


    // Fades and slides out the pop-up message for user log-in
    function hideLoginErrorMessage() {
        const loginerrorMsg = document.querySelector('.login-error-message-container');
        if (!loginerrorMsg) return;

        loginerrorMsg.classList.add('login-error-hide');
        setTimeout(() => loginErrorMsg.remove(), 450);// hides the message pop-up
    }

    // Hide when clicking outside
    function hideLoginErrorOnClickOutside(selector) {
        const loginerrorMsg = document.querySelector(selector);
        if (!loginerrorMsg) return;

        document.addEventListener('click', (e) => {
            if (!loginerrorMsg.contains(e.target)) {
                hideLoginErrorMessage();
            }
        });
    }

    // Fades and slides out the pop-up message for change password(confirm password)
    function hideConfirmPassErrorMessage() {
        const errorMsg = document.querySelector('.confirm-pass-error-message-container');
        if (!errorMsg) return;

        errorMsg.classList.add('error-hide');
        setTimeout(() => errorMsg.remove(), 450);
    }

    // Hide message when clicking 
    function hideConfirmPassErrorOnClickOutside() {
        const errorMsg = document.querySelector('.confirm-pass-error-message-container');
        if (!errorMsg) return;

        document.addEventListener('click', function listener(e) {
            if (!errorMsg.contains(e.target)) {
                hideConfirmPassErrorMessage();
                document.removeEventListener('click', listener);
            }
        });
    }

   
    // Fades and slides out the pop-up message for new password(new password)
    function hideNewPassErrorMessage() {
        const error = document.getElementById('error');
        if (!error) return;

        error.classList.remove('show');
        error.classList.add('hide');

        // remove from layout after transition
        setTimeout(() => {
            error.style.display = 'none';
        }, 300); // match CSS transition duration
    }

    // hide when clicking outside
    function hideNewPassErrorOnClickOutside() {
        const error = document.getElementById('error');
        if (!error) return;

        function listener(e) {
            if (!error.contains(e.target)) {
                hideNewPassErrorMessage();
                document.removeEventListener('click', listener);
            }
        }

        document.addEventListener('click', listener);
    }
