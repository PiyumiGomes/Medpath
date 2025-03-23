document.addEventListener('DOMContentLoaded', function () {
    // Function to animate counting
    function animateCount(element, start, end, duration, isMillion = false) {
        let startTime = null;

        function count(timestamp) {
            if (!startTime) startTime = timestamp;
            const progress = timestamp - startTime;
            const current = Math.min(Math.floor(progress / duration * (end - start) + start), end);
            
            // If the count is for million, append " million+" after the number
            if (isMillion && current === end) {
                element.innerText = current + " million+";
            } else if (!isMillion && current === end) {
                element.innerText = current + "+";
            } else {
                element.innerText = current;
            }

            if (current < end) {
                requestAnimationFrame(count);
            }
        }

        requestAnimationFrame(count);
    }

    // Function to start counting when the section is in view
    function startCounting(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCount(document.getElementById('users-helped'), 0, 1.4, 600, true);
                animateCount(document.getElementById('risk-assessments'), 0, 523, 900, true); // Add million+
                animateCount(document.getElementById('support'), 0, 17.9, 900, true); // Add million+
                observer.unobserve(entry.target); // Stop observing after animation
            }
        });
    }

    // Create an IntersectionObserver instance
    var observer = new IntersectionObserver(startCounting, { threshold: 0.5 });

    // Observe the stats section
    var statsSection = document.querySelector('.stats');
    if (statsSection) {
        observer.observe(statsSection);
    }
});