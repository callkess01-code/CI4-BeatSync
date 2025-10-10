<section class="events-section">
  <div class="events-container">
    <div class="events-header">
      <h2 class="events-title">Upcoming Events</h2>
    </div>

    <div class="events-grid">
      <?php foreach ($events as $event): ?>
        <div class="event-card" data-event-id="<?php echo $event['id']; ?>">
          <div class="event-image-wrapper">
            <img src="<?php echo htmlspecialchars($event['image']); ?>" alt="<?php echo htmlspecialchars($event['alt']); ?>" />
            <div class="event-overlay"></div>
          </div>
          <div class="event-content">
            <div class="event-date">
              <span class="event-month"><?php echo date('M', strtotime($event['date'])); ?></span>
              <span class="event-day"><?php echo date('d', strtotime($event['date'])); ?></span>
            </div>
            <div class="event-info">
              <h3 class="event-name"><?php echo htmlspecialchars($event['title']); ?></h3>
              <p class="event-location"><?php echo htmlspecialchars($event['location'] ?? 'BGC, Philippines'); ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<style>
/* --- Layout Wrapper --- */
.events-section {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  padding: 80px 20px;
  position: relative;
}

.events-container {
  display: flex;
  flex-direction: column;
  gap: 50px;
  justify-content: flex-start;
  align-items: center;
  width: 100%;
  max-width: 1200px;
}

.events-header {
  text-align: center;
  width: 100%;
}

.events-title {
  font-family: 'Bebas Neue', Arial, sans-serif;
  font-size: clamp(36px, 8vw, 72px);
  font-weight: 400;
  color: #ffffff;
  text-align: left;
  letter-spacing: 2px;
  margin-bottom: 20px;
}

/* --- Grid --- */
.events-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 30px;
  width: 100%;
  perspective: 1000px;
}

/* --- Card --- */
.event-card {
  background: linear-gradient(145deg, #0a0a0a, #121212);
  border-radius: 16px;
  overflow: hidden;
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  cursor: pointer;
  position: relative;
  transform-style: preserve-3d;
  border: 1px solid rgba(255, 255, 255, 0.08);
  box-shadow: 
    0 10px 20px rgba(0, 0, 0, 0.5),
    0 6px 6px rgba(0, 0, 0, 0.3),
    inset 0 -1px 0 rgba(255, 255, 255, 0.05),
    inset 0 1px 0 rgba(255, 255, 255, 0.03);
}

.event-card::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(255,255,255,0.05) 0%, transparent 50%, rgba(0,0,0,0.2) 100%);
  z-index: 1;
  opacity: 0.6;
  border-radius: 16px;
  pointer-events: none;
}

.event-card:hover {
  transform: translateY(-15px) translateZ(30px) rotateX(5deg);
  border-color: rgba(255, 64, 87, 0.3);
  box-shadow: 
    0 30px 60px rgba(0, 0, 0, 0.7),
    0 15px 25px rgba(0, 0, 0, 0.5),
    0 5px 15px rgba(255, 64, 87, 0.3);
}

.event-card:active {
  transform: translateY(-12px) translateZ(25px) rotateX(3deg) scale(0.98);
  transition: all 0.1s ease;
}

/* --- Image --- */
.event-image-wrapper {
  position: relative;
  width: 100%;
  height: 250px;
  overflow: hidden;
  z-index: 2;
}

.event-image-wrapper img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.event-card:hover .event-image-wrapper img {
  transform: scale(1.1);
}

.event-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
  opacity: 0;
  transition: opacity 0.3s ease;
  z-index: 3;
}

.event-card:hover .event-overlay {
  opacity: 1;
}

/* --- Content --- */
.event-content {
  display: flex;
  gap: 16px;
  padding: 24px;
  position: relative;
  z-index: 2;
  background: linear-gradient(to bottom, rgba(10,10,10,0.95), rgba(0,0,0,0.98));
}

.event-date {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background: linear-gradient(145deg, #1a1a1a, #0d0d0d);
  border-radius: 12px;
  padding: 12px 16px;
  min-width: 70px;
  box-shadow: 
    0 4px 8px rgba(0, 0, 0, 0.4),
    inset 0 1px 0 rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.06);
}

.event-month {
  font-size: 14px;
  font-weight: 700;
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.event-day {
  font-family: 'Bebas Neue', Arial, sans-serif;
  font-size: 32px;
  font-weight: 400;
  color: #fff;
  line-height: 1;
}

.event-info {
  display: flex;
  flex-direction: column;
  gap: 8px;
  flex: 1;
}

.event-name {
  font-family: 'Bebas Neue', Arial, sans-serif;
  font-size: 24px;
  font-weight: 400;
  color: #fff;
  letter-spacing: 1px;
}

.event-location {
  font-size: 14px;
  color: rgba(255, 255, 255, 0.7);
  display: flex;
  align-items: center;
  gap: 8px;
}

.event-location::before {
  content: '📍';
  font-size: 14px;
}

/* --- Responsive --- */
@media (min-width: 768px) {
  .events-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
  }
}

@media (min-width: 1024px) {
  .events-grid {
    grid-template-columns: repeat(3, 1fr);
  }

  .event-image-wrapper {
    height: 280px;
  }
}

@media (max-width: 767px) {
  .events-grid {
    perspective: none;
  }

  .event-card:hover {
    transform: translateY(-10px);
  }
}
</style>
