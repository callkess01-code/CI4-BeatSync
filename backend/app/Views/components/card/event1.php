<?php foreach ($events as $event): ?>
                        <div class="event-card" data-event-id="<?php echo $event['id']; ?>">
                            <div class="event-image-wrapper">
                                <img src="<?php echo $event['image']; ?>" alt="<?php echo htmlspecialchars($event['alt']); ?>" />
                                <div class="event-overlay">
                                </div>
                            </div>
                            <div class="event-content">
                                <div class="event-date">
                                    <span class="event-month">OCT</span>
                                    <span class="event-day">31</span>
                                </div>
                                <div class="event-info">
                                    <h3 class="event-name"><?php echo htmlspecialchars($event['title']); ?></h3>
                                    <p class="event-location">BGC, Philippines</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

<style>/* Events section */
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
}

.events-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 30px;
  width: 100%;
  perspective: 1000px;
}

.slider-controls {
  display: flex;
  justify-content: flex-start;
  align-items: center;
   margin-right: -1200px;
  gap: 20px;
}

.slider-control {
  width: 50px;
  height: 50px;
  border: 2px solid #ff4057;
  border-radius: 50%;
  background: transparent;
  color: #ff4057;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  font-size: 20px;
  font-weight: bold;
  transition: all 0.3s ease;
}

.slider-control:hover {
  background-color: #ff4057;
  color: #ffffff;
  transform: scale(1.1);
}

.events-slider {
  display: flex;
  gap: 30px;
  justify-content: flex-start;
  align-items: center;
  width: 100%;
  overflow-x: auto;
  padding: 20px 0;
  scroll-behavior: smooth;
  -webkit-overflow-scrolling: touch;
}

.events-slider::-webkit-scrollbar {
  display: none;
}

.event-card {
  background: linear-gradient(145deg, #0a0a0a);
  border-radius: 16px;
  overflow: hidden;
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  cursor: pointer;
  position: relative;
  transform-style: preserve-3d;
  
  /* Enhanced 3D effect with multiple shadows */
  box-shadow: 
    0 10px 20px rgba(0, 0, 0, 0.5),
    0 6px 6px rgba(0, 0, 0, 0.3),
    inset 0 -1px 0 rgba(255, 255, 255, 0.05),
    inset 0 1px 0 rgba(255, 255, 255, 0.03);
  
  /* Subtle border for depth */
  border: 1px solid rgba(255, 255, 255, 0.08);
}

/* Pseudo-element for additional depth */
.event-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, transparent 50%, rgba(0, 0, 0, 0.2) 100%);
  pointer-events: none;
  z-index: 1;
  opacity: 0.6;
  border-radius: 16px;
}

.event-card:hover {
  transform: translateY(-15px) translateZ(30px) rotateX(5deg);
  box-shadow: 
    0 30px 60px rgba(0, 0, 0, 0.7),
    0 15px 25px rgba(0, 0, 0, 0.5),
    0 5px 15px rgba(255, 64, 87, 0.3),
    inset 0 -2px 0 rgba(255, 255, 255, 0.1),
    inset 0 2px 0 rgba(255, 255, 255, 0.05);
  
  border-color: rgba(255, 64, 87, 0.3);
}

/* Active state for click feedback */
.event-card:active {
  transform: translateY(-12px) translateZ(25px) rotateX(3deg) scale(0.98);
  transition: all 0.1s ease;
}

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
  -o-object-fit: cover;
     object-fit: cover;
  transition: transform 0.4s ease;
}

.event-card:hover .event-image-wrapper img {
  transform: scale(1.1);
}

.event-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
  z-index: 3;
}

.event-card:hover .event-overlay {
  opacity: 1;
}

.event-content {
  display: flex;
  gap: 16px;
  padding: 24px;
  position: relative;
  z-index: 2;
  background: linear-gradient(to bottom, rgba(10, 10, 10, 0.95), rgba(0, 0, 0, 0.98));
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
  flex-shrink: 0;
  box-shadow: 
    0 4px 8px rgba(0, 0, 0, 0.4),
    inset 0 1px 0 rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.06);
}

.event-month {
  font-size: 14px;
  font-weight: 700;
  color: #ffffff;
  text-transform: uppercase;
  letter-spacing: 1px;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
}

.event-day {
  font-family: 'Bebas Neue', Arial, sans-serif;
  font-size: 32px;
  font-weight: 400;
  color: #ffffff;
  line-height: 1;
  text-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
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
  color: #ffffff;
  letter-spacing: 1px;
  line-height: 1.2;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
}

.event-location,
.event-time {
  font-size: 14px;
  color: rgba(255, 255, 255, 0.7);
  font-weight: 400;
  display: flex;
  align-items: center;
  gap: 8px;
}

.event-location::before {
  content: '📍';
  font-size: 14px;
}

.event-time::before {
  content: '🕐';
  font-size: 14px;
}

/* Responsive adjustments */
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

/* Reduce 3D effects on mobile for performance */
@media (max-width: 767px) {
  .events-grid {
    perspective: none;
  }
  
  .event-card:hover {
    transform: translateY(-10px);
  }
}</style>