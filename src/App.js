import "./App.css";
import Confetti from "./Confetti";
import { useEffect, useState } from "react";

const shareMessage = "I just ran my first container using Docker";
const shareLink = "https://docker.com/";

const App = () => {
  const [isVisible, setIsVisible] = useState(false);
  const [mousePosition, setMousePosition] = useState({ x: 0, y: 0 });

  useEffect(() => {
    setIsVisible(true);
    const handleMouseMove = (e) => {
      setMousePosition({
        x: (e.clientX / window.innerWidth - 0.5) * 20,
        y: (e.clientY / window.innerHeight - 0.5) * 20
      });
    };
    window.addEventListener('mousemove', handleMouseMove);
    return () => window.removeEventListener('mousemove', handleMouseMove);
  }, []);

  return (
    <div className="App">
      <div className="animated-bg"></div>
      <div className="animated-bg bg2"></div>
      <div className="animated-bg bg3"></div>
      
      <Confetti />
      <header className="App-header">
        <div className={`content-wrapper ${isVisible ? 'fade-in' : ''}`}
             style={{
               transform: `perspective(1000px) rotateX(${mousePosition.y * 0.1}deg) rotateY(${mousePosition.x * 0.1}deg)`
             }}>
          
          <div className="hero-section">
            <div className="logo-container">
              <span className="docker-emoji" role="img" aria-label="docker">🐳</span>
              <div className="glow-effect"></div>
            </div>
            
            <h1 className="main-title">
              Docker Learning Journey
              <div className="title-decoration"></div>
            </h1>
            
            <h2 className="subtitle">
              La Plateforme_
              <span className="highlight-dot"></span>
            </h2>
          </div>

          <div className="card glass-morphism"
               style={{
                 transform: `perspective(1000px) rotateX(${mousePosition.y * 0.05}deg) rotateY(${mousePosition.x * 0.05}deg)`
               }}>
            <div className="card-content">
              <div className="icon-container">
                <i className="fas fa-docker-whale"></i>
              </div>
              <p className="message">
                 Cette application a été modifiée et conteneurisée avec succès.
              </p>
              <div className="card-decoration"></div>
            </div>
          </div>

          <div className="features-grid">
            <div className="feature-item">
              <div className="feature-icon">🚀</div>
              <span>Conteneurisation</span>
            </div>
            <div className="feature-item">
              <div className="feature-icon">⚡</div>
              <span>Performance</span>
            </div>
            <div className="feature-item">
              <div className="feature-icon">🛡️</div>
              <span>Sécurité</span>
            </div>
          </div>

          <div className="social-links-container">
            <div className="social-links">
              <a
                target="_blank"
                href={`https://twitter.com/intent/tweet?text=${shareMessage}&url=${shareLink}`}
                className="social-button twitter"
                rel="noopener noreferrer"
              >
                <i className="fa-brands fa-x-twitter"></i>
                <span>Partager</span>
                <div className="button-glow"></div>
              </a>
              <a
                target="_blank"
                href={`https://www.linkedin.com/sharing/share-offsite/?url=${shareLink}`}
                className="social-button linkedin"
                rel="noopener noreferrer"
              >
                <i className="fa-brands fa-linkedin"></i>
                <span>Partager</span>
                <div className="button-glow"></div>
              </a>
            </div>
          </div>
        </div>
      </header>
    </div>
  );
};

export default App; 